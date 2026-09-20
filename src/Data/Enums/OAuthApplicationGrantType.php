<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/OAuthApplicationGrantType */
enum OAuthApplicationGrantType: string
{
	case authorization_code = 'authorization_code';
	case client_credentials = 'client_credentials';
}
