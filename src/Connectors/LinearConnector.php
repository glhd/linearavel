<?php

namespace Glhd\Linearavel\Connectors;

use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearListRequest;
use Glhd\Linearavel\Requests\PendingLinearObjectRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\LinearListResponse;
use Glhd\Linearavel\Responses\LinearObjectResponse;
use Glhd\Linearavel\Responses\LinearResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Glhd\Linearavel\Support\KeyHelper;
use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Http\Faking\MockClient;
use Spatie\LaravelData\Data;

/** @method LinearObjectResponse|LinearListResponse send(LinearRequest $request, MockClient $mockClient = null, callable $handleRetry = null) */
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
	
	/**
	 * @template T of Data
	 * @param string $name
	 * @param class-string<T> $class
	 * @param array $args
	 * @return \Glhd\Linearavel\Requests\PendingLinearObjectRequest<T>
	 */
	protected function linearObjectQuery(string $name, string $class, array $args = []): PendingLinearObjectRequest
	{
		return new PendingLinearObjectRequest(
			name: $name,
			class: $class,
			connector: $this,
			query: GraphQueryBuilder::make('query', $name)
				->withArguments(collect($args)->reject(fn($arg) => null === $arg)->all()),
		);
	}
	
	/**
	 * @template T of Data
	 * @param string $name
	 * @param class-string<T> $class
	 * @param array $args
	 * @return \Glhd\Linearavel\Requests\PendingLinearListRequest<T>
	 */
	protected function linearListQuery(string $name, string $class, array $args = []): PendingLinearListRequest
	{
		return new PendingLinearListRequest(
			name: $name,
			class: $class,
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
