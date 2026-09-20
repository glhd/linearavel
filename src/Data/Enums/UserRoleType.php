<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/UserRoleType */
enum UserRoleType: string
{
	case owner = 'owner';
	case admin = 'admin';
	case guest = 'guest';
	case user = 'user';
	case app = 'app';
}
