<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/WorkflowDefinitionEditAccess */
enum WorkflowDefinitionEditAccess: string
{
	case everyone = 'everyone';
	case workspaceAdmins = 'workspaceAdmins';
	case teamOwners = 'teamOwners';
	case owner = 'owner';
}
