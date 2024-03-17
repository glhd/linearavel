<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Carbon\CarbonImmutable;

class CycleCreateInput
{
	public function __construct(
		public string $teamId,
		public CarbonImmutable $startsAt,
		public CarbonImmutable $endsAt,
		public ?string $id = null,
		public ?string $name = null,
		public ?string $description = null,
		public ?CarbonImmutable $completedAt = null
	) {
	}
}
