<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/CyclePeriod */
enum CyclePeriod: string
{
	case before = 'before';
	case during = 'during';
	case after = 'after';
}
