<?php

namespace Glhd\Linearavel\Data\Enums;

enum UserRoleType: string
{
	case admin = 'admin';
	case guest = 'guest';
	case user = 'user';
}
