<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/FeedSummarySchedule */
enum FeedSummarySchedule: string
{
	case daily = 'daily';
	case weekly = 'weekly';
	case never = 'never';
}
