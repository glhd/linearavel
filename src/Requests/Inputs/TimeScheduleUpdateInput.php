<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class TimeScheduleUpdateInput
{
	public function __construct(
		public ?string $name = null,
		/** @var iterable<TimeScheduleEntryInput>|Collection<int, TimeScheduleEntryInput> */
		public ?iterable $entries = null,
		public ?string $externalId = null,
		public ?string $externalUrl = null
	) {
	}
}
