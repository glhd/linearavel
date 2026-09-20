<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NotificationDeliveryPreferencesInput */
class NotificationDeliveryPreferencesInput
{
	public function __construct(public ?NotificationDeliveryPreferencesChannelInput $mobile = null)
	{
	}
}
