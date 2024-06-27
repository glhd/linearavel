<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectMilestoneCreateInput */
class ProjectMilestoneCreateInput
{
	public function __construct(
		public string $name,
		public string $projectId,
		public ?string $id = null,
		public ?string $description = null,
		public ?string $descriptionData = null,
		public ?string $targetDate = null,
		public ?float $sortOrder = null
	) {
	}
}
