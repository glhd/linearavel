<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/TeamRoleType */
enum TeamRoleType: string
{
	case owner = 'owner';
	case member = 'member';
}
