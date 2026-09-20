<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\ReleaseStageType;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleaseStageCreateInput */
class ReleaseStageCreateInput
{
	public function __construct(public string $name, public string $color, public ReleaseStageType $type, public float $position, public string $pipelineId, public ?string $id = null, public ?bool $frozen = null)
	{
	}
}
