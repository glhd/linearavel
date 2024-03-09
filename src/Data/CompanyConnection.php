<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\CompanyEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\Company, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class CompanyConnection extends Data
{
    function __construct(
        /** @var Collection<int, CompanyEdge> */
        public Collection $edges,
        /** @var Collection<int, Company> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
