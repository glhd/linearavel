<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/FacetPageSource */
enum FacetPageSource: string
{
	case projects = 'projects';
	case initiatives = 'initiatives';
	case teamIssues = 'teamIssues';
	case feed = 'feed';
}
