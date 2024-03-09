<?php

namespace Glhd\Linearavel\Data\Enums;

enum ProjectUpdateReminderFrequency: string
{
	case week = 'week';
	case twoWeeks = 'twoWeeks';
	case month = 'month';
	case never = 'never';
}
