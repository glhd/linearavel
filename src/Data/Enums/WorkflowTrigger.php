<?php

namespace Glhd\Linearavel\Data\Enums;

enum WorkflowTrigger: string
{
	case entityCreated = 'entityCreated';
	case entityUpdated = 'entityUpdated';
	case entityCreatedOrUpdated = 'entityCreatedOrUpdated';
	case entityRemoved = 'entityRemoved';
	case entityUnarchived = 'entityUnarchived';
}
