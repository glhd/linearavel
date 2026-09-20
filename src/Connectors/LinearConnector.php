<?php

namespace Glhd\Linearavel\Connectors;

use Glhd\Linearavel\Exceptions\LinearRequestException;
use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Response;
use Throwable;

class LinearConnector extends Connector
{
	use QueriesLinear;
	use MutatesLinear;

	public function __construct(
		protected string $api_key,
		protected string $base_url = 'https://api.linear.app/graphql',
	) {
	}

	public function resolveBaseUrl(): string
	{
		return $this->base_url;
	}

	/**
	 * Linear returns GraphQL errors with a 200 status code, so we have to look
	 * at the body to know whether a request actually succeeded.
	 */
	public function hasRequestFailed(Response $response): ?bool
	{
		if ($response->serverError() || $response->clientError()) {
			return true;
		}

		return count($this->graphQlErrors($response)) > 0;
	}

	public function getRequestException(Response $response, ?Throwable $senderException): ?Throwable
	{
		$errors = $this->graphQlErrors($response);

		if (count($errors)) {
			return new LinearRequestException($response, $errors, $senderException);
		}

		return null;
	}

	protected function defaultAuth(): ?Authenticator
	{
		return new TokenAuthenticator($this->api_key, prefix: '');
	}

	protected function defaultHeaders(): array
	{
		return [
			'Content-Type' => 'application/json',
			'Accept' => 'application/json',
		];
	}

	/** @return array<int, array<string, mixed>> */
	protected function graphQlErrors(Response $response): array
	{
		try {
			$errors = $response->json('errors');
		} catch (Throwable) {
			return [];
		}

		return is_array($errors) ? $errors : [];
	}
}
