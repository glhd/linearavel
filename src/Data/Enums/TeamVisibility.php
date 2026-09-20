<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/TeamVisibility */
enum TeamVisibility: string
{
	case public = 'public';
	case restricted = 'restricted';
	case private = 'private';
}
