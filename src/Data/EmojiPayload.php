<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Emoji;
class EmojiPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|Emoji $emoji, public Optional|bool $success)
    {
    }
}
