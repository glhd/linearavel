<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationGetPullRequestCheckLogsToolCallArgs */
class AiConversationGetPullRequestCheckLogsToolCallArgs extends Data
{
	public function __construct(public Optional|AiConversationSearchEntitiesToolCallResultEntities $entity, public Optional|string $checkName, public Optional|string|null $workflowName)
	{
	}
}
