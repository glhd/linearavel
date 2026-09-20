<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\AiConversationQueryUpdatesToolCallArgsUpdateType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationQueryUpdatesToolCallArgs */
class AiConversationQueryUpdatesToolCallArgs extends Data
{
	public function __construct(public Optional|AiConversationQueryUpdatesToolCallArgsUpdateType $updateType, public Optional|AiConversationSearchEntitiesToolCallResultEntities|null $entity)
	{
	}
}
