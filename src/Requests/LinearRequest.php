<?php

namespace Glhd\Linearavel\Requests;

use Glhd\Linearavel\Support\GraphQueryBuilder;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class LinearRequest extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;

	public function __construct(
		protected ?string $response,
		protected GraphQueryBuilder|string $gql,
		protected array $variables = [],
	) {
	}

	public function resolveEndpoint(): string
	{
		return '/';
	}

	protected function defaultBody(): array
	{
		$body = ['query' => (string) $this->gql];

		$variables = $this->gql instanceof GraphQueryBuilder
			? $this->gql->variables()
			: $this->variables;

		if (count($variables)) {
			$body['variables'] = $variables;
		}

		return $body;
	}
}
