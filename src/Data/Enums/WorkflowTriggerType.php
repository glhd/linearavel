<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/WorkflowTriggerType */
enum WorkflowTriggerType: string
{
	case issue = 'issue';
	case project = 'project';
}
