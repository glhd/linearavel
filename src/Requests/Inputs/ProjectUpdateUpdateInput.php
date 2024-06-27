<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\ProjectUpdateHealthType;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectUpdateUpdateInput */
class ProjectUpdateUpdateInput
{
	public function __construct(public ?string $body = null, public ?string $bodyData = null, public ?ProjectUpdateHealthType $health = null, public ?bool $isDiffHidden = null)
	{
	}
}
