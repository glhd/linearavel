<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TimeScheduleUpdateInput */
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
