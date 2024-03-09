<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Emoji;
class EmojiEdge extends Data
{
    function __construct(public Optional|Emoji $node, public Optional|string $cursor)
    {
    }
}
