<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Reaction;
class ReactionPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|Reaction $reaction, public Optional|bool $success)
    {
    }
}
