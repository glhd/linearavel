<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/NotificationChannel */
enum NotificationChannel: string
{
	case desktop = 'desktop';
	case mobile = 'mobile';
	case email = 'email';
	case slack = 'slack';
}
