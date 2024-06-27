<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CycleUpdateInput */
class CycleUpdateInput
{
	public function __construct(
		public ?string $name = null,
		public ?string $description = null,
		public ?DateTimeInterface $startsAt = null,
		public ?DateTimeInterface $endsAt = null,
		public ?DateTimeInterface $completedAt = null
	) {
	}
}
