<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Carbon\CarbonImmutable;

class UserUpdateInput
{
	public function __construct(
		public ?string $name = null,
		public ?string $displayName = null,
		public ?string $avatarUrl = null,
		public ?bool $active = null,
		public ?string $disableReason = null,
		public ?bool $admin = null,
		public ?string $description = null,
		public ?string $statusEmoji = null,
		public ?string $statusLabel = null,
		public ?CarbonImmutable $statusUntilAt = null,
		public ?string $timezone = null
	) {
	}
}
