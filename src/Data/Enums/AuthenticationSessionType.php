<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/AuthenticationSessionType */
enum AuthenticationSessionType: string
{
	case web = 'web';
	case desktop = 'desktop';
	case ios = 'ios';
	case android = 'android';
}
