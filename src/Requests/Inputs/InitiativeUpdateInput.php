<?php

namespace Glhd\Linearavel\Requests\Inputs;

class InitiativeUpdateInput
{
	public function __construct(
		public ?string $name = null,
		public ?string $description = null,
		public ?string $ownerId = null,
		public ?float $sortOrder = null,
		public ?string $color = null,
		public ?string $targetDate = null
	) {
	}
}
