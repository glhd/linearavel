<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class FavoriteEdge extends Data
{
	public function __construct(public Optional|Favorite $node, public Optional|string $cursor)
	{
	}
}
