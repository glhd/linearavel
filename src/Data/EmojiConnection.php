<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\EmojiEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\Emoji, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class EmojiConnection extends Data
{
    function __construct(
        /** @var Collection<int, EmojiEdge> */
        public Collection $edges,
        /** @var Collection<int, Emoji> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
