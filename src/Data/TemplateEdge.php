<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Template;
class TemplateEdge extends Data
{
    function __construct(public Optional|Template $node, public Optional|string $cursor)
    {
    }
}
