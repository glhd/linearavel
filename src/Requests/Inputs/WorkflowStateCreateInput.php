<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/WorkflowStateCreateInput */
class WorkflowStateCreateInput
{
	public function __construct(
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
