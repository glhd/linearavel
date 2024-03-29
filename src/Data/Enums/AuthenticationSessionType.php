<?php

namespace Glhd\Linearavel\Data\Enums;

enum AuthenticationSessionType: string
{
	case web = 'web';
	case desktop = 'desktop';
	case ios = 'ios';
	case android = 'android';
}
