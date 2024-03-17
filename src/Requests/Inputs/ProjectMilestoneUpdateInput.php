<?php

namespace Glhd\Linearavel\Requests\Inputs;

class ProjectMilestoneUpdateInput
{
	public function __construct(
		public ?string $name = null,
		public ?string $description = null,
		public ?string $descriptionData = null,
		public ?string $targetDate = null,
		public ?float $sortOrder = null
	) {
	}
}
