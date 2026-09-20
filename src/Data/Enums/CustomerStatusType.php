<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/CustomerStatusType */
enum CustomerStatusType: string
{
	case active = 'active';
	case inactive = 'inactive';
}
