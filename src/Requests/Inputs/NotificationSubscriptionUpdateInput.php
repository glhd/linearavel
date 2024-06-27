<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NotificationSubscriptionUpdateInput */
class NotificationSubscriptionUpdateInput
{
	public function __construct(
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $notificationSubscriptionTypes = null,
		public ?bool $active = null
	) {
	}
}
