<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectMilestoneUpdateInput */
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
