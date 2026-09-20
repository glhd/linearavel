<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/InitiativeStatus */
enum InitiativeStatus: string
{
	case Proposed = 'Proposed';
	case Planned = 'Planned';
	case Active = 'Active';
	case Completed = 'Completed';
	case Canceled = 'Canceled';
}
