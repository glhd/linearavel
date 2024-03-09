<?php

namespace Glhd\Linearavel\Enums;

enum WorkflowType: string
{
	case sla = 'sla';
	case custom = 'custom';
	case viewSubscription = 'viewSubscription';
}
