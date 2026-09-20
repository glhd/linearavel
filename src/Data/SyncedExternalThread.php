<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/SyncedExternalThread */
class SyncedExternalThread extends Data
{
	public function __construct(public Optional|string $type, public Optional|bool $isConnected, public Optional|bool $isPersonalIntegrationConnected, public Optional|bool $isPersonalIntegrationRequired, public Optional|string|null $id, public Optional|string|null $subType, public Optional|string|null $name, public Optional|string|null $displayName, public Optional|string|null $url)
	{
	}
}
