<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/WorkflowType */
enum WorkflowType: string
{
	case sla = 'sla';
	case custom = 'custom';
	case viewSubscription = 'viewSubscription';
}
