<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Carbon\CarbonImmutable;

class NotificationUpdateInput
{
	public function __construct(public ?CarbonImmutable $readAt = null, public ?CarbonImmutable $snoozedUntilAt = null, public ?string $projectUpdateId = null)
	{
	}
}
