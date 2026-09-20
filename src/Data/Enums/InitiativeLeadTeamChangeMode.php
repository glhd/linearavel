<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/InitiativeLeadTeamChangeMode */
enum InitiativeLeadTeamChangeMode: string
{
	case selectedOnly = 'selectedOnly';
	case includeDescendants = 'includeDescendants';
}
