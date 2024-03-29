<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class EmojiEdge extends Data
{
	public function __construct(public Optional|Emoji $node, public Optional|string $cursor)
	{
	}
}
