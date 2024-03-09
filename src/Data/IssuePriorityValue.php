<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class IssuePriorityValue extends Data
{
    function __construct(public Optional|int $priority, public Optional|string $label)
    {
    }
}
