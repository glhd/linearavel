<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AgentSkillCreateInput */
class AgentSkillCreateInput
{
	public function __construct(public string $body, public ?string $id = null, public ?string $teamId = null, public ?string $title = null, public ?string $icon = null, public ?string $color = null)
	{
	}
}
