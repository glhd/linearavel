<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class ActorBot extends Data
{
    function __construct(public Optional|string|null $id, public Optional|string $type, public Optional|string|null $subType, public Optional|string|null $name, public Optional|string|null $userDisplayName, public Optional|string|null $avatarUrl)
    {
    }
}
