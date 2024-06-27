<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/ViewPreferencesType */
enum ViewPreferencesType: string
{
	case organization = 'organization';
	case user = 'user';
}
