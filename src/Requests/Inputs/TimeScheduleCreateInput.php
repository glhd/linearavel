<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class TimeScheduleCreateInput
{
	public function __construct(
		public string $name,
		/** @var iterable<TimeScheduleEntryInput>|Collection<int, TimeScheduleEntryInput> */
		public iterable $entries,
		public ?string $id = null,
		public ?string $externalId = null,
		public ?string $externalUrl = null
	) {
	}
}
