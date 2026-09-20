<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NotificationDeliveryPreferencesScheduleInput */
class NotificationDeliveryPreferencesScheduleInput
{
	public function __construct(public NotificationDeliveryPreferencesDayInput $sunday, public NotificationDeliveryPreferencesDayInput $monday, public NotificationDeliveryPreferencesDayInput $tuesday, public NotificationDeliveryPreferencesDayInput $wednesday, public NotificationDeliveryPreferencesDayInput $thursday, public NotificationDeliveryPreferencesDayInput $friday, public NotificationDeliveryPreferencesDayInput $saturday, public ?bool $disabled = null)
	{
	}
}
