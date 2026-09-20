<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/ReleaseChannel */
enum ReleaseChannel: string
{
	case development = 'development';
	case internal = 'internal';
	case privateBeta = 'privateBeta';
	case beta = 'beta';
	case preRelease = 'preRelease';
	case public = 'public';
}
