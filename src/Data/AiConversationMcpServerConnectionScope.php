<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\AiConversationMcpServerConnectionScopeType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationMcpServerConnectionScope */
class AiConversationMcpServerConnectionScope extends Data
{
	public function __construct(public Optional|AiConversationMcpServerConnectionScopeType $type, public Optional|string|null $teamId, public Optional|string|null $workflowDefinitionId, public Optional|string|null $workflowDefinitionDraftId)
	{
	}
}
