<?php

namespace Glhd\Linearavel\Requests\Inputs;

class WorkflowStateCreateInput
{
	function __construct(
		public string $type,
		public string $name,
		public string $color,
		public string $teamId,
		public ?string $id = null,
		public ?string $description = null,
		public ?float $position = null
	) {
	}
}
