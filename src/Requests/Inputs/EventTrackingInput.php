<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/EventTrackingInput */
class EventTrackingInput
{
	public function __construct(public string $event, public ?string $properties = null, public ?string $sessionId = null)
	{
	}
}
