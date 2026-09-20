<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ReleasePipelinePayload */
class ReleasePipelinePayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|ReleasePipeline $releasePipeline, public Optional|bool $success)
	{
	}
}
