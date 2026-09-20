<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NotificationFilter */
class NotificationFilterInput
{
	public function __construct(
		public ?IDComparatorInput $id = null,
		public ?DateComparatorInput $createdAt = null,
		public ?DateComparatorInput $updatedAt = null,
		public ?StringComparatorInput $type = null,
		public ?NotificationSubscriptionTypeComparatorInput $subscriptionType = null,
		public ?DateComparatorInput $archivedAt = null,
		/** @var iterable<NotificationFilterInput>|Collection<int, NotificationFilterInput> */
		public ?iterable $and = null,
		/** @var iterable<NotificationFilterInput>|Collection<int, NotificationFilterInput> */
		public ?iterable $or = null
	) {
	}
}
