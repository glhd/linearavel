<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\AgentActivityType;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AgentActivityPromptCreateInputContent */
class AgentActivityPromptCreateInputContentInput
{
	public function __construct(public AgentActivityType $type, public ?string $body = null, public ?string $bodyData = null)
	{
	}
}
