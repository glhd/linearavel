<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/ProjectTab */
enum ProjectTab: string
{
	case customers = 'customers';
	case documents = 'documents';
	case issues = 'issues';
	case loops = 'loops';
	case updates = 'updates';
}
