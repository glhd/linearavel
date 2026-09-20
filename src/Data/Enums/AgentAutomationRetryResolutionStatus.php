<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AgentAutomationRetryResolutionStatus */
enum AgentAutomationRetryResolutionStatus: string
{
	case scheduled = 'scheduled';
	case notScheduled = 'notScheduled';
}
