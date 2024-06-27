<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/CustomViewEdge */
class CustomViewEdge extends Data
{
	public function __construct(public Optional|CustomView $node, public Optional|string $cursor)
	{
	}
}
