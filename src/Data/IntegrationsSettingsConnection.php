<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\IntegrationsSettingsEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\IntegrationsSettings, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class IntegrationsSettingsConnection extends Data
{
    function __construct(
        /** @var Collection<int, IntegrationsSettingsEdge> */
        public Collection $edges,
        /** @var Collection<int, IntegrationsSettings> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
