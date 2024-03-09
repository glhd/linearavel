<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Comment;
class CommentEdge extends Data
{
    function __construct(public Optional|Comment $node, public Optional|string $cursor)
    {
    }
}
