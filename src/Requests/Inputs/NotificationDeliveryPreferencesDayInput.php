<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NotificationDeliveryPreferencesDayInput */
class NotificationDeliveryPreferencesDayInput
{
	public function __construct(public ?string $start = null, public ?string $end = null)
	{
	}
}
