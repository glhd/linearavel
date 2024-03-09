<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Company;
class CompanyEdge extends Data
{
    function __construct(public Optional|Company $node, public Optional|string $cursor)
    {
    }
}
