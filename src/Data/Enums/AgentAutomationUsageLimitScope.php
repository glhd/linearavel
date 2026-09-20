<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AgentAutomationUsageLimitScope */
enum AgentAutomationUsageLimitScope: string
{
	case loop = 'loop';
	case workspace = 'workspace';
}
