<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/DateResolutionType */
enum DateResolutionType: string
{
	case month = 'month';
	case quarter = 'quarter';
	case halfYear = 'halfYear';
	case year = 'year';
}
