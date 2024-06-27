<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/UserFlagUpdateOperation */
enum UserFlagUpdateOperation: string
{
	case incr = 'incr';
	case decr = 'decr';
	case clear = 'clear';
	case lock = 'lock';
}
