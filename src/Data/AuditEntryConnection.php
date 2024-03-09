<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\AuditEntryEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\AuditEntry, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class AuditEntryConnection extends Data
{
    function __construct(
        /** @var Collection<int, AuditEntryEdge> */
        public Collection $edges,
        /** @var Collection<int, AuditEntry> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
