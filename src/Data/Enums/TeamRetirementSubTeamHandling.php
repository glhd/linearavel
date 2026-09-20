<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/TeamRetirementSubTeamHandling */
enum TeamRetirementSubTeamHandling: string
{
	case unnest = 'unnest';
	case retire = 'retire';
}
