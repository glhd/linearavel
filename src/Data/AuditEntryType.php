<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuditEntryType extends Data
{
	public function __construct(public Optional|string $type, public Optional|string $description)
	{
	}
}
