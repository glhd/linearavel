<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\AgentActivitySignal;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AgentActivityCreateInput */
class AgentActivityCreateInput
{
	public function __construct(public string $agentSessionId, public string $content, public ?string $id = null, public ?AgentActivitySignal $signal = null, public ?string $signalMetadata = null, public ?string $contextualMetadata = null, public ?bool $ephemeral = null)
	{
	}
}
