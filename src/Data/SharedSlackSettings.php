<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class SharedSlackSettings extends Data
{
	function __construct(public Optional|string|null $teamName, public Optional|string|null $teamId)
	{
	}
}
