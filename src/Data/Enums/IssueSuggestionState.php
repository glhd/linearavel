<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/IssueSuggestionState */
enum IssueSuggestionState: string
{
	case active = 'active';
	case stale = 'stale';
	case accepted = 'accepted';
	case dismissed = 'dismissed';
}
