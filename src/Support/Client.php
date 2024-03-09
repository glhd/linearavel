<?php

namespace Glhd\Linearavel\Support;

use Glhd\Linearavel\Data\Team;
use Glhd\Linearavel\Data\User;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
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
		$props = $this->key_helper->get(User::class, $only, $except);
		
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
	
	/** @return Collection<int, Team> */
	public function teams(string ...$keys): Collection
	{
		$fields = $this->fields($keys);
		
		$result = $this->query(<<<gql
			query TeamsQuery {
				teams {
					nodes {
						{$fields}		
					}
				}
			}
		gql
		);
		
		return Team::collect($result->json('data.teams.nodes'), Collection::class);
	}
	
	protected function fields(array $keys, int $depth = 0): string
	{
		return collect($keys)
			->unless($depth, fn($keys) => $keys->flip()->undot())
			->map(function($value, $key) use ($depth) {
				$line = $key;
				
				if (is_array($value)) {
					$line .= " {\n".$this->fields($value, $depth + 1)."\n}";
				}
				
				return $line;
			})
			->implode("\n");
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
