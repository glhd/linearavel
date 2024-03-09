<?php

namespace Glhd\Linearavel\Enums;

enum PushSubscriptionType: string
{
	case web = 'web';
	case apple = 'apple';
	case appleDevelopment = 'appleDevelopment';
	case firebase = 'firebase';
}
