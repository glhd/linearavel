<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/ProjectTab */
enum ProjectTab: string
{
	case documents = 'documents';
	case issues = 'issues';
	case activity = 'activity';
}
