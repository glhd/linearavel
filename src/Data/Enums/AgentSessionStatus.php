<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AgentSessionStatus */
enum AgentSessionStatus: string
{
	case pending = 'pending';
	case active = 'active';
	case complete = 'complete';
	case awaitingInput = 'awaitingInput';
	case error = 'error';
	case stale = 'stale';
}
