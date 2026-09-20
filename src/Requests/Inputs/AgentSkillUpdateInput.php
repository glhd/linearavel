<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AgentSkillUpdateInput */
class AgentSkillUpdateInput
{
	public function __construct(public ?string $teamId = null, public ?string $body = null, public ?string $title = null, public ?string $icon = null, public ?string $color = null)
	{
	}
}
