<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\TemplateEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\Template, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class TemplateConnection extends Data
{
    function __construct(
        /** @var Collection<int, TemplateEdge> */
        public Collection $edges,
        /** @var Collection<int, Template> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
