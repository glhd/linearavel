<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/IssueSharedAccessDisallowedField */
enum IssueSharedAccessDisallowedField: string
{
	case projectId = 'projectId';
	case teamId = 'teamId';
	case cycleId = 'cycleId';
	case projectMilestoneId = 'projectMilestoneId';
}
