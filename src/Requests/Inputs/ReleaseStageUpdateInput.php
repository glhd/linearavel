<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleaseStageUpdateInput */
class ReleaseStageUpdateInput
{
	public function __construct(public ?string $name = null, public ?string $color = null, public ?float $position = null, public ?bool $frozen = null)
	{
	}
}
