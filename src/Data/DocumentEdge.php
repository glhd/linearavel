<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/DocumentEdge */
class DocumentEdge extends Data
{
	public function __construct(public Optional|Document $node, public Optional|string $cursor)
	{
	}
}
