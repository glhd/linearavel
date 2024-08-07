<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CycleCreateInput */
class CycleCreateInput
{
	public function __construct(
		public string $teamId,
		public DateTimeInterface $startsAt,
		public DateTimeInterface $endsAt,
		public ?string $id = null,
		public ?string $name = null,
		public ?string $description = null,
		public ?DateTimeInterface $completedAt = null
	) {
	}
}
