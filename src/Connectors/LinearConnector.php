<?php

namespace Glhd\Linearavel\Connectors;

use Glhd\Linearavel\Requests\TeamsRequest;
use Glhd\Linearavel\Support\KeyHelper;
use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

class LinearConnector extends Connector
{
	public function __construct(
		protected string $api_key,
		protected KeyHelper $key_helper,
		protected string $base_url,
	) {
	}
	
	public function teams(string ...$keys)
	{
		$response = $this->send(new TeamsRequest($keys));
		
		return $response->json();
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
