<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\OrganizationInviteEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\OrganizationInvite, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class OrganizationInviteConnection extends Data
{
    function __construct(
        /** @var Collection<int, OrganizationInviteEdge> */
        public Optional|Collection $edges,
        /** @var Collection<int, OrganizationInvite> */
        public Optional|Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
