<?php

namespace Glhd\Linearavel\Requests\Inputs;

class TemplateUpdateInput
{
	function __construct(public ?string $name = null, public ?string $description = null, public ?string $teamId = null, public ?string $templateData = null)
	{
	}
}
