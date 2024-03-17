<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\ContextViewType;
use Glhd\Linearavel\Data\Enums\UserContextViewType;
use Illuminate\Support\Collection;

class NotificationSubscriptionCreateInput
{
	public function __construct(
		/** @var Collection<int, string> */
		public Collection $notificationSubscriptionTypes,
		public ?string $id = null,
		public ?string $customViewId = null,
		public ?string $cycleId = null,
		public ?string $labelId = null,
		public ?string $projectId = null,
		public ?string $teamId = null,
		public ?string $userId = null,
		public ?ContextViewType $contextViewType = null,
		public ?UserContextViewType $userContextViewType = null,
		public ?bool $active = null
	) {
	}
}
