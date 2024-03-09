<?php

namespace Glhd\Linearavel\Data\Enums;

enum UserFlagUpdateOperation: string
{
	case incr = 'incr';
	case decr = 'decr';
	case clear = 'clear';
	case lock = 'lock';
}
