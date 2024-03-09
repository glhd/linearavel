<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\IntegrationsSettingsEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\IntegrationsSettings, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class IntegrationsSettingsConnection extends Data
{
    function __construct(
        /** @var Collection<int, IntegrationsSettingsEdge> */
        public Optional|Collection $edges,
        /** @var Collection<int, IntegrationsSettings> */
        public Optional|Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
