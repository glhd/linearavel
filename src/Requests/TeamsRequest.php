<?php

namespace Glhd\Linearavel\Requests;

class TeamsRequest extends LinearRequest
{
	public function __construct(
		protected array $keys
	) {
	}
	
	protected function gql(): string
	{
		$fields = $this->fields($this->keys);
		
		return <<<gql
			query TeamsQuery {
				teams {
					nodes {
						{$fields}		
					}
				}
			}
		gql;
	}
}
