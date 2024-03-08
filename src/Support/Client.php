<?php

namespace Glhd\Linearavel\Support;

use Glhd\Linearavel\Data\Queries\User;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Spatie\LaravelData\Support\DataConfig;

class Client
{
	public function __construct(
		protected string $api_key,
		protected string $base_url = 'https://api.linear.app/graphql',
	)
	{
	}
	
	public function viewer(
		?array $only = null,
		?array $except = null,
	): User
	{
		$props = app(DataConfig::class)
			->getDataClass(User::class)
			->properties
			->keys()
			->when($only, fn(Collection $keys) => $keys->only($only))
			->when($except, fn(Collection $keys) => $keys->except($except))
			->implode("\n");
		
		$query = <<<GRAPHQL
		query ViewerQuery {
			viewer {
				{$props}
			}
		}
		GRAPHQL;
		
		$result = $this->request()->post('/', ['query' => $query])->throw();
		
		return User::from($result->json('data.viewer'));
	}
	
	protected function request(): PendingRequest
	{
		return Http::baseUrl($this->base_url)
			->withHeader('Authorization', $this->api_key)
			->asJson();
	}
}
