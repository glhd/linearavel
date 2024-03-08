<?php

namespace Glhd\Linearavel\Support;

use Glhd\Linearavel\Data\Queries\User;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class Client
{
	public function __construct(
		protected string $api_key,
		protected string $base_url = 'https://api.linear.app/graphql',
	)
	{
	}
	
	public function viewer(): User
	{
		$query = <<<GRAPHQL
		query Me {
			viewer {
				id
				name
				email
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
