<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/EntityExternalLinkEdge */
class EntityExternalLinkEdge extends Data
{
	public function __construct(public Optional|EntityExternalLink $node, public Optional|string $cursor)
	{
	}
}
