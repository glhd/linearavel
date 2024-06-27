<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/PushSubscriptionType */
enum PushSubscriptionType: string
{
	case web = 'web';
	case apple = 'apple';
	case appleDevelopment = 'appleDevelopment';
	case firebase = 'firebase';
}
