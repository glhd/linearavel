<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ReleasePipelineEdge */
class ReleasePipelineEdge extends Data
{
	public function __construct(public Optional|ReleasePipeline $node, public Optional|string $cursor)
	{
	}
}
