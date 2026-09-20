<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/WorkflowIntelligence */
enum WorkflowIntelligence: string
{
	case auto = 'auto';
	case low = 'low';
	case medium = 'medium';
	case high = 'high';
}
