<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Carbon\CarbonImmutable;

class CycleUpdateInput
{
	function __construct(
		public ?string $name = null,
		public ?string $description = null,
		public ?CarbonImmutable $startsAt = null,
		public ?CarbonImmutable $endsAt = null,
		public ?CarbonImmutable $completedAt = null
	) {
	}
}
