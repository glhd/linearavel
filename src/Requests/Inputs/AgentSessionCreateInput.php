<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AgentSessionCreateInput */
class AgentSessionCreateInput
{
	public function __construct(public string $appUserId, public ?string $id = null, public ?string $issueId = null, public ?string $context = null)
	{
	}
}
