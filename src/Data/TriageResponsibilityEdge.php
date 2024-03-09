<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\TriageResponsibility;
class TriageResponsibilityEdge extends Data
{
    function __construct(public Optional|TriageResponsibility $node, public Optional|string $cursor)
    {
    }
}
