<?php

namespace Glhd\Linearavel\Exceptions;

use Illuminate\Support\Collection;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;
use Throwable;

/**
 * Thrown when Linear returns GraphQL errors. These come back with a 200 status
 * code, so they would otherwise look like a successful response.
 */
class LinearRequestException extends RequestException
{
	/** @var array<int, array<string, mixed>> */
	protected array $errors;

	public function __construct(Response $response, array $errors, ?Throwable $previous = null)
	{
		$this->errors = $errors;

		parent::__construct($response, static::summarize($errors), 0, $previous);
	}

	/** @return array<int, array<string, mixed>> The raw GraphQL errors */
	public function errors(): array
	{
		return $this->errors;
	}

	/** @return Collection<int, string> */
	public function messages(): Collection
	{
		return collect($this->errors)
			->map(fn($error) => data_get($error, 'extensions.userPresentableMessage') ?: data_get($error, 'message'))
			->filter()
			->values();
	}

	/** The Linear error codes, e.g. `AUTHENTICATION_ERROR` or `RATELIMITED`. */
	public function codes(): Collection
	{
		return collect($this->errors)
			->map(fn($error) => data_get($error, 'extensions.code'))
			->filter()
			->values();
	}

	protected static function summarize(array $errors): string
	{
		$messages = collect($errors)
			->map(fn($error) => data_get($error, 'message'))
			->filter()
			->implode('; ');

		return $messages ?: 'The Linear API returned an unknown GraphQL error.';
	}
}
