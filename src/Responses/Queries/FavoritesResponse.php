<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\FavoriteConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class FavoritesResponse extends LinearResponse
{
	public function resolve(): FavoriteConnection
	{
		return FavoriteConnection::from($this->json('data.favorites'));
	}
}
