<?php

namespace Glhd\Linearavel\Requests\Inputs;

class CustomViewUpdateInput
{
	public function __construct(
		public ?string $name = null,
		public ?string $description = null,
		public ?string $icon = null,
		public ?string $color = null,
		public ?string $teamId = null,
		public ?string $projectId = null,
		public ?string $ownerId = null,
		public ?string $filters = null,
		public ?string $filterData = null,
		public ?string $projectFilterData = null,
		public ?bool $shared = null
	) {
	}
}
