<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\AgentActivitySignal;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AgentActivityCreatePromptInput */
class AgentActivityCreatePromptInput
{
	public function __construct(public string $agentSessionId, public AgentActivityPromptCreateInputContentInput $content, public ?string $id = null, public ?AgentActivitySignal $signal = null, public ?string $signalMetadata = null, public ?string $contextualMetadata = null, public ?string $sourceCommentId = null, public ?bool $queued = null)
	{
	}
}
