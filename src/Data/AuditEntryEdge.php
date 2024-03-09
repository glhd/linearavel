<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\AuditEntry;
class AuditEntryEdge extends Data
{
    function __construct(public Optional|AuditEntry $node, public Optional|string $cursor)
    {
    }
}
