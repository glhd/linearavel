<?php

namespace Glhd\Linearavel\Requests\Inputs;

class IssueLabelCreateInput
{
	public function __construct(
		public string $name,
		public ?string $id = null,
		public ?string $description = null,
		public ?string $color = null,
		public ?string $parentId = null,
		public ?string $teamId = null
	) {
	}
}
