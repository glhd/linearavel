<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\ContextViewType;
use Glhd\Linearavel\Data\Enums\UserContextViewType;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NotificationSubscriptionCreateInput */
class NotificationSubscriptionCreateInput
{
	public function __construct(
		public ?string $id = null,
		public ?string $customViewId = null,
		public ?string $cycleId = null,
		public ?string $labelId = null,
		public ?string $projectId = null,
		public ?string $teamId = null,
		public ?string $userId = null,
		public ?ContextViewType $contextViewType = null,
		public ?UserContextViewType $userContextViewType = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $notificationSubscriptionTypes = null,
		public ?bool $active = null
	) {
	}
}
