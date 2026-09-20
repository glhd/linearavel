<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\AgentAutomationRetryResolutionStatus;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/AgentAutomationRetryResolution */
class AgentAutomationRetryResolution extends Data
{
	public function __construct(public Optional|AgentAutomationRetryResolutionStatus $status, public Optional|string|null $aiConversationId)
	{
	}
}
