<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/WorkflowTrigger */
enum WorkflowTrigger: string
{
	case entityCreated = 'entityCreated';
	case entityUpdated = 'entityUpdated';
	case entityCreatedOrUpdated = 'entityCreatedOrUpdated';
	case entityRemoved = 'entityRemoved';
	case entityUnarchived = 'entityUnarchived';
	case cycleStarted = 'cycleStarted';
	case cycleEnded = 'cycleEnded';
	case commentAdded = 'commentAdded';
	case updatePosted = 'updatePosted';
	case chatMessagePosted = 'chatMessagePosted';
	case chatReactionAdded = 'chatReactionAdded';
	case customerRequestAdded = 'customerRequestAdded';
}
