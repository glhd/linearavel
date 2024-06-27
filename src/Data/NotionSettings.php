<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/NotionSettings */
class NotionSettings extends Data
{
	public function __construct(public Optional|string $workspaceId, public Optional|string $workspaceName)
	{
	}
}
