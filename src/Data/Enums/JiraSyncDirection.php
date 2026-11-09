<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/JiraSyncDirection */
enum JiraSyncDirection: string
{
	case bidirectional = 'bidirectional';
	case jiraToLinear = 'jiraToLinear';
	case legacyJiraToLinear = 'legacyJiraToLinear';
}
