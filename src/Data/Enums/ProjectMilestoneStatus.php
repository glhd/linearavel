<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/ProjectMilestoneStatus */
enum ProjectMilestoneStatus: string
{
	case unstarted = 'unstarted';
	case next = 'next';
	case overdue = 'overdue';
	case done = 'done';
}
