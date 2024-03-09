<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class SentrySettings extends Data
{
	function __construct(public Optional|string $organizationSlug)
	{
	}
}
