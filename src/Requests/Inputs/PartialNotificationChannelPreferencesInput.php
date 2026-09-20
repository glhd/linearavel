<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/PartialNotificationChannelPreferencesInput */
class PartialNotificationChannelPreferencesInput
{
	public function __construct(public ?bool $mobile = null, public ?bool $desktop = null, public ?bool $email = null, public ?bool $slack = null)
	{
	}
}
