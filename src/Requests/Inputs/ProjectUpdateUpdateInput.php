<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\ProjectUpdateHealthType;

class ProjectUpdateUpdateInput
{
	public function __construct(public ?string $body = null, public ?string $bodyData = null, public ?ProjectUpdateHealthType $health = null, public ?bool $isDiffHidden = null)
	{
	}
}
