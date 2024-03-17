<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

class NotificationUpdateInput
{
	public function __construct(public ?DateTimeInterface $readAt = null, public ?DateTimeInterface $snoozedUntilAt = null, public ?string $projectUpdateId = null)
	{
	}
}
