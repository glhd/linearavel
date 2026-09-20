<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/GithubOrgType */
enum GithubOrgType: string
{
	case user = 'user';
	case organization = 'organization';
}
