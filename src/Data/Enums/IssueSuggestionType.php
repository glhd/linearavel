<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/IssueSuggestionType */
enum IssueSuggestionType: string
{
	case team = 'team';
	case project = 'project';
	case assignee = 'assignee';
	case label = 'label';
	case similarIssue = 'similarIssue';
	case relatedIssue = 'relatedIssue';
}
