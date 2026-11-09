<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/OrganizationQuotaScope */
enum OrganizationQuotaScope: string
{
	case workspace = 'workspace';
	case team = 'team';
	case project = 'project';
	case initiative = 'initiative';
}
