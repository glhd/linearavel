<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AgentActivityExecutionSkippedReason */
enum AgentActivityExecutionSkippedReason: string
{
	case quotaExceeded = 'quotaExceeded';
	case permissionDenied = 'permissionDenied';
}
