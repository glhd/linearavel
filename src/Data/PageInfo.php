<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/PageInfo */
class PageInfo extends Data
{
	public function __construct(public Optional|bool $hasPreviousPage, public Optional|bool $hasNextPage, public Optional|string|null $startCursor, public Optional|string|null $endCursor)
	{
	}
}
