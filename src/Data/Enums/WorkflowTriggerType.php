<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/WorkflowTriggerType */
enum WorkflowTriggerType: string
{
	case issue = 'issue';
	case project = 'project';
	case document = 'document';
	case initiative = 'initiative';
	case team = 'team';
	case release = 'release';
	case cycle = 'cycle';
	case schedule = 'schedule';
	case chat = 'chat';
}
