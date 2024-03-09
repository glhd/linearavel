<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PageInfo extends Data
{
	function __construct(public Optional|bool $hasPreviousPage, public Optional|bool $hasNextPage, public Optional|string|null $startCursor, public Optional|string|null $endCursor)
	{
	}
}
