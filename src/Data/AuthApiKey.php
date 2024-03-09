<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuthApiKey extends Data
{
	function __construct(public Optional|string $id)
	{
	}
}
