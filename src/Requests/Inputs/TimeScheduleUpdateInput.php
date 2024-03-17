<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class TimeScheduleUpdateInput
{
	public function __construct(
		/** @var Collection<int, TimeScheduleEntryInput> */
		public Collection $entries,
		public ?string $name = null,
		public ?string $externalId = null,
		public ?string $externalUrl = null
	) {
	}
}
