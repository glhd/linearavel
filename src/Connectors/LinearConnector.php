<?php

namespace Glhd\Linearavel\Connectors;

use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\LinearResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Glhd\Linearavel\Support\KeyHelper;
use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Faking\MockClient;

/** @method send(LinearRequest $request, MockClient $mockClient = null, callable $handleRetry = null): LinearResponse */
class LinearConnector extends Connector
{
	use QueriesLinear;
	
	public function __construct(
		protected string $api_key,
		protected KeyHelper $key_helper,
		protected string $base_url,
	) {
	}
	
	public function resolveBaseUrl(): string
	{
		return $this->base_url;
	}
	
	protected function linearQuery(string $name, array $args): PendingLinearRequest
	{
		return new PendingLinearRequest(
			name: $name, 
			connector: $this, 
			query: GraphQueryBuilder::make('query', $name)
				->withArguments(collect($args)->reject(fn($arg) => null === $arg)->all()),
		);
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
