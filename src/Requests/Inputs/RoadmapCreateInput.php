<?php

namespace Glhd\Linearavel\Requests\Inputs;

class RoadmapCreateInput
{
	public function __construct(
		public string $name,
		public ?string $id = null,
		public ?string $description = null,
		public ?string $ownerId = null,
		public ?float $sortOrder = null,
		public ?string $color = null
	) {
	}
}
