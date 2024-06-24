<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\FavoritePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class FavoriteUpdateResponse extends LinearResponse
{
	public function resolve(): FavoritePayload
	{
		return FavoritePayload::from($this->json('data.favoriteUpdate'));
	}
}
