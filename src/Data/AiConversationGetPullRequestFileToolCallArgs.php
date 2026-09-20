<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationGetPullRequestFileToolCallArgs */
class AiConversationGetPullRequestFileToolCallArgs extends Data
{
	public function __construct(public Optional|AiConversationSearchEntitiesToolCallResultEntities $entity, public Optional|string $path)
	{
	}
}
