<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/NotificationDeliveryPreferencesSchedule */
class NotificationDeliveryPreferencesSchedule extends Data
{
	public function __construct(public Optional|NotificationDeliveryPreferencesDay $sunday, public Optional|NotificationDeliveryPreferencesDay $monday, public Optional|NotificationDeliveryPreferencesDay $tuesday, public Optional|NotificationDeliveryPreferencesDay $wednesday, public Optional|NotificationDeliveryPreferencesDay $thursday, public Optional|NotificationDeliveryPreferencesDay $friday, public Optional|NotificationDeliveryPreferencesDay $saturday, public Optional|bool|null $disabled)
	{
	}
}
