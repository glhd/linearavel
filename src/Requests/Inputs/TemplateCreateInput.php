<?php

namespace Glhd\Linearavel\Requests\Inputs;

class TemplateCreateInput
{
	public function __construct(public string $type, public string $name, public string $templateData, public ?string $id = null, public ?string $teamId = null, public ?string $description = null)
	{
	}
}
