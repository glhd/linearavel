<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/NotificationDeliveryPreferencesChannel */
class NotificationDeliveryPreferencesChannel extends Data
{
	public function __construct(public Optional|bool|null $notificationsDisabled, public Optional|NotificationDeliveryPreferencesSchedule|null $schedule)
	{
	}
}
