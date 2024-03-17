<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OauthClientEdge extends Data
{
	public function __construct(public Optional|OauthClient $node, public Optional|string $cursor)
	{
	}
}
