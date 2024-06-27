<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/SLADayCountType */
enum SLADayCountType: string
{
	case all = 'all';
	case onlyBusinessDays = 'onlyBusinessDays';
}
