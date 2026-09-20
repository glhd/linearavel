<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/OAuthApplicationDistribution */
enum OAuthApplicationDistribution: string
{
	case private = 'private';
	case public = 'public';
}
