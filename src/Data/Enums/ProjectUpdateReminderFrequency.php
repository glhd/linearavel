<?php

namespace Glhd\Linearavel\Enums;

enum ProjectUpdateReminderFrequency: string
{
	case week = 'week';
	case twoWeeks = 'twoWeeks';
	case month = 'month';
	case never = 'never';
}
