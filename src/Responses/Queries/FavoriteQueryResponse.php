<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Favorite;
use Glhd\Linearavel\Responses\LinearResponse;

class FavoriteQueryResponse extends LinearResponse
{
	public function resolve(): Favorite
	{
		return Favorite::from($this->json('data.favorite'));
	}
}
