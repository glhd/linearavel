<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NotificationDeliveryPreferencesChannelInput */
class NotificationDeliveryPreferencesChannelInput
{
	public function __construct(public ?bool $notificationsDisabled = null, public ?NotificationDeliveryPreferencesScheduleInput $schedule = null)
	{
	}
}
