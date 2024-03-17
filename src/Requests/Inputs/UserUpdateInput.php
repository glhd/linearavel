<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

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
		public ?DateTimeInterface $statusUntilAt = null,
		public ?string $timezone = null
	) {
	}
}
