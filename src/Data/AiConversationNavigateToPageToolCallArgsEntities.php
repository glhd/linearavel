<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationNavigateToPageToolCallArgsEntities */
class AiConversationNavigateToPageToolCallArgsEntities extends Data
{
	public function __construct(public Optional|string $entityType, public Optional|string $uuid)
	{
	}
}
