<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\AiConversationBasePart;
use Glhd\Linearavel\Data\Contracts\AiConversationPart;
use Glhd\Linearavel\Data\Enums\AgentAutomationUsageLimitScope;
use Glhd\Linearavel\Data\Enums\AiConversationErrorType;
use Glhd\Linearavel\Data\Enums\AiConversationPartType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AiConversationErrorPart */
class AiConversationErrorPart extends Data implements AiConversationBasePart, AiConversationPart
{
	public function __construct(public Optional|string $id, public Optional|AiConversationPartType $type, public Optional|AiConversationPartMetadata $metadata, public Optional|string $message, public Optional|AiConversationErrorType|null $errorType, public Optional|AgentAutomationUsageLimitScope|null $usageLimitScope, public Optional|string|null $usageLimitResetsAt, public Optional|AgentAutomationRetryResolution|null $retryResolution)
	{
	}
}
