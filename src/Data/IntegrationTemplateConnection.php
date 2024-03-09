<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\IntegrationTemplateEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\IntegrationTemplate, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class IntegrationTemplateConnection extends Data
{
    function __construct(
        /** @var Collection<int, IntegrationTemplateEdge> */
        public Collection $edges,
        /** @var Collection<int, IntegrationTemplate> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
