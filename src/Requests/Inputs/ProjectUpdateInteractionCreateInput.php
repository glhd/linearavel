<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectUpdateInteractionCreateInput */
class ProjectUpdateInteractionCreateInput
{
	public function __construct(public string $projectUpdateId, public DateTimeInterface $readAt, public ?string $id = null)
	{
	}
}
