<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/ReleaseChannel */
enum ReleaseChannel: string
{
	case internal = 'internal';
	case beta = 'beta';
	case preRelease = 'preRelease';
	case public = 'public';
}
