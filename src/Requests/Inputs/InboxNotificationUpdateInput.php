<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InboxNotificationUpdateInput */
class InboxNotificationUpdateInput
{
	public function __construct(public ?bool $read = null, public ?DateTimeInterface $snoozedUntilAt = null)
	{
	}
}
