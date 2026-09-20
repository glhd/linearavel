<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\ProjectStatusType;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectStatusCreateInput */
class ProjectStatusCreateInput
{
	public function __construct(public string $name, public string $color, public float $position, public ProjectStatusType $type, public ?string $id = null, public ?string $description = null, public ?bool $indefinite = null, public ?string $teamId = null)
	{
	}
}
