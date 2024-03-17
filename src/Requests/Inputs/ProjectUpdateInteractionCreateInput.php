<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

class ProjectUpdateInteractionCreateInput
{
	public function __construct(public string $projectUpdateId, public DateTimeInterface $readAt, public ?string $id = null)
	{
	}
}
