<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ArchiveResponse extends Data
{
	public function __construct(public Optional|string $archive, public Optional|float $totalCount, public Optional|float $databaseVersion, public Optional|bool $includesDependencies)
	{
	}
}
