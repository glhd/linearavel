<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\CommentEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\Comment, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class CommentConnection extends Data
{
    function __construct(
        /** @var Collection<int, CommentEdge> */
        public Collection $edges,
        /** @var Collection<int, Comment> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
