<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\ArchivePayload;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/TeamArchivePayload */
class TeamArchivePayload extends Data implements ArchivePayload
{
	public function __construct(public Optional|float $lastSyncId, public Optional|bool $success, public Optional|Team|null $entity)
	{
	}
}
