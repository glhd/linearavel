<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AgentSessionUserStateInput */
class AgentSessionUserStateInput
{
	public function __construct(public string $userId, public ?DateTimeInterface $lastReadAt = null)
	{
	}
}
