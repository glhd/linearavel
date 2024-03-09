<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\IntegrationsSettings;
class IntegrationsSettingsEdge extends Data
{
    function __construct(public Optional|IntegrationsSettings $node, public Optional|string $cursor)
    {
    }
}
