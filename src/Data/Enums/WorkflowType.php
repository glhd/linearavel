<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/WorkflowType */
enum WorkflowType: string
{
	case sla = 'sla';
	case automation = 'automation';
	case viewSubscription = 'viewSubscription';
	case triage = 'triage';
	case triageAutomation = 'triageAutomation';
	case release = 'release';
}
