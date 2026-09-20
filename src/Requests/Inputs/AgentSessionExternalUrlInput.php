<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AgentSessionExternalUrlInput */
class AgentSessionExternalUrlInput
{
	public function __construct(public string $url, public string $label)
	{
	}
}
