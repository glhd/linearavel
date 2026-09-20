<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationQueryViewToolCallArgsView */
class AiConversationQueryViewToolCallArgsView extends Data
{
	public function __construct(public Optional|string $type, public Optional|AiConversationSearchEntitiesToolCallResultEntities|null $group, public Optional|string|null $predefinedView)
	{
	}
}
