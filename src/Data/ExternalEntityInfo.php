<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\ExternalEntityInfoMetadata;
use Glhd\Linearavel\Data\Enums\ExternalSyncService;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ExternalEntityInfo */
class ExternalEntityInfo extends Data
{
	public function __construct(public Optional|string $id, public Optional|ExternalSyncService $service, public Optional|ExternalEntityInfoMetadata|null $metadata)
	{
	}
}
