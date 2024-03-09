<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class SlackAsksTeamSettings extends Data
{
    function __construct(public Optional|string $id, public Optional|bool $hasDefaultAsk)
    {
    }
}
