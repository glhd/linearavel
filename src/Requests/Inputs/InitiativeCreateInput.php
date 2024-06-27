<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InitiativeCreateInput */
class InitiativeCreateInput
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
