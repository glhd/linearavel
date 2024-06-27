<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TimeScheduleCreateInput */
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
