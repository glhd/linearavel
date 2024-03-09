<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class ArchiveResponse extends Data
{
    function __construct(public Optional|string $archive, public Optional|float $totalCount, public Optional|float $databaseVersion, public Optional|bool $includesDependencies)
    {
    }
}
