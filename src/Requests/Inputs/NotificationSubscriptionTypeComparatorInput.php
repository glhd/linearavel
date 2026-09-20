<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\NotificationSubscriptionType;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NotificationSubscriptionTypeComparator */
class NotificationSubscriptionTypeComparatorInput
{
	public function __construct(
		public ?NotificationSubscriptionType $eq = null,
		public ?NotificationSubscriptionType $neq = null,
		/** @var iterable<NotificationSubscriptionType>|Collection<int, NotificationSubscriptionType> */
		public ?iterable $in = null,
		/** @var iterable<NotificationSubscriptionType>|Collection<int, NotificationSubscriptionType> */
		public ?iterable $nin = null
	) {
	}
}
