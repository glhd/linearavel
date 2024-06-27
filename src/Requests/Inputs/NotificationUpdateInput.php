<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NotificationUpdateInput */
class NotificationUpdateInput
{
	public function __construct(public ?DateTimeInterface $readAt = null, public ?DateTimeInterface $snoozedUntilAt = null, public ?string $projectUpdateId = null)
	{
	}
}
