<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class NotificationSubscriptionUpdateInput
{
	public function __construct(
		/** @var Collection<int, string> */
		public Collection $notificationSubscriptionTypes,
		public ?bool $active = null
	) {
	}
}
