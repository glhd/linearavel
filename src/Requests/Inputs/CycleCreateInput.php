<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

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
