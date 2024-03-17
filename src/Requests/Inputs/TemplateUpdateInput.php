<?php

namespace Glhd\Linearavel\Requests\Inputs;

class TemplateUpdateInput
{
	public function __construct(public ?string $name = null, public ?string $description = null, public ?string $teamId = null, public ?string $templateData = null)
	{
	}
}
