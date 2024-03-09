<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\IntegrationTemplate;
class IntegrationTemplateEdge extends Data
{
    function __construct(public Optional|IntegrationTemplate $node, public Optional|string $cursor)
    {
    }
}
