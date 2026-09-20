<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\ProjectStatusType;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectStatusUpdateInput */
class ProjectStatusUpdateInput
{
	public function __construct(public ?string $name = null, public ?string $color = null, public ?string $description = null, public ?float $position = null, public ?ProjectStatusType $type = null, public ?bool $indefinite = null)
	{
	}
}
