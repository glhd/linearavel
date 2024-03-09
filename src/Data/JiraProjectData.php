<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class JiraProjectData extends Data
{
	function __construct(public Optional|string $id, public Optional|string $key, public Optional|string $name)
	{
	}
}
