<?php

namespace Glhd\Linearavel\Support;

use Glhd\Linearavel\Data\Queries\Team;
use Glhd\Linearavel\Data\Queries\User;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Client
{
	public function __construct(
		protected string $api_key,
		protected KeyHelper $key_helper,
		protected string $base_url,
	) {
	}
	
	public function viewer(?array $only = null, ?array $except = null): User
	{
		$props = $this->key_helper->get(User::class, $only, $except)->implode("\n");
		
		$result = $this->query(<<<gql
			query ViewerQuery {
				viewer {
					{$props}
				}
			}
		gql
		);
		
		return User::from($result->json('data.viewer'));
	}
	
	public function teams(?array $only = null, ?array $except = null)
	{
		$props = $this->key_helper->get(Team::class, $only, $except)->implode("\n");
		
		$result = $this->query(<<<gql
			query TeamsQuery {
				teams {
					nodes {
						{$props}		
					}
				}
			}
		gql
		);
		
		return Team::collect($result->json('data.teams.nodes'));
	}
	
	protected function query(string $query): Response
	{
		return $this->request()->post('/', ['query' => $query])->throw();
	}
	
	protected function request(): PendingRequest
	{
		return Http::baseUrl($this->base_url)
			->withHeader('Authorization', $this->api_key)
			->asJson();
	}
}
