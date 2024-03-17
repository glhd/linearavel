<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class TimeScheduleCreateInput
{
	public function __construct(
		public string $name,
		/** @var Collection<int, TimeScheduleEntryInput> */
		public Collection $entries,
		public ?string $id = null,
		public ?string $externalId = null,
		public ?string $externalUrl = null
	) {
	}
}
