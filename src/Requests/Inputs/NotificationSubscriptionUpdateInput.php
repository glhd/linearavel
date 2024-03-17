<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NotificationSubscriptionUpdateInput
{
	public function __construct(
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $notificationSubscriptionTypes = null,
		public ?bool $active = null
	) {
	}
}
