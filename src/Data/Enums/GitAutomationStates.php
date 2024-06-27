<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/GitAutomationStates */
enum GitAutomationStates: string
{
	case draft = 'draft';
	case start = 'start';
	case review = 'review';
	case mergeable = 'mergeable';
	case merge = 'merge';
}
