<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CommentEdge extends Data
{
	function __construct(public Optional|Comment $node, public Optional|string $cursor)
	{
	}
}
