<?php

namespace Glhd\Linearavel\Connectors;

use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

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
}
