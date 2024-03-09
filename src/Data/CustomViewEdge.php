<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\CustomView;
class CustomViewEdge extends Data
{
    function __construct(public Optional|CustomView $node, public Optional|string $cursor)
    {
    }
}
