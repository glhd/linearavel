<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/SemanticSearchResultType */
enum SemanticSearchResultType: string
{
	case issue = 'issue';
	case project = 'project';
	case initiative = 'initiative';
	case document = 'document';
}
