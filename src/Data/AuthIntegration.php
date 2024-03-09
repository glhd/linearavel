<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuthIntegration extends Data
{
	function __construct(public Optional|string $id)
	{
	}
}