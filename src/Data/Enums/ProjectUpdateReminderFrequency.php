<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/ProjectUpdateReminderFrequency */
enum ProjectUpdateReminderFrequency: string
{
	case week = 'week';
	case twoWeeks = 'twoWeeks';
	case month = 'month';
	case never = 'never';
}
