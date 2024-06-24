<?php

namespace Glhd\Linearavel\Requests;

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
		protected string $gql,
	) {
	}
	
	public function resolveEndpoint(): string
	{
		return '/';
	}
	
	protected function defaultBody(): array
	{
		return ['query' => $this->gql];
	}
}
