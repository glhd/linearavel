<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Carbon\CarbonImmutable;

class ProjectUpdateInteractionCreateInput
{
	function __construct(public string $projectUpdateId, public CarbonImmutable $readAt, public ?string $id = null)
	{
	}
}
