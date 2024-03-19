<?php

namespace Glhd\Linearavel\Connectors;

use Glhd\Linearavel\Requests\PendingLinearListRequest;
use Glhd\Linearavel\Requests\PendingLinearObjectRequest;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Glhd\Linearavel\Support\KeyHelper;
use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Spatie\LaravelData\Data;

class LinearConnector extends Connector
{
	use QueriesLinear;
	use MutatesLinear;
	
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
	 * @return \Glhd\Linearavel\Requests\PendingLinearObjectRequest<T>
	 */
	protected function linearObjectMutation(string $name, string $class, array $args = []): PendingLinearObjectRequest
	{
		return new PendingLinearObjectRequest(
			name: $name,
			class: $class,
			connector: $this,
			query: GraphQueryBuilder::make('mutation', $name)
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
	
	/**
	 * @template T of Data
	 * @param string $name
	 * @param class-string<T> $class
	 * @param array $args
	 * @return \Glhd\Linearavel\Requests\PendingLinearListRequest<T>
	 */
	protected function linearListMutation(string $name, string $class, array $args = []): PendingLinearListRequest
	{
		return new PendingLinearListRequest(
			name: $name,
			class: $class,
			connector: $this,
			query: GraphQueryBuilder::make('mutation', $name)
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
