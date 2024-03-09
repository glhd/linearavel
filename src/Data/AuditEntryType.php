<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class AuditEntryType extends Data
{
    function __construct(public Optional|string $type, public Optional|string $description)
    {
    }
}
