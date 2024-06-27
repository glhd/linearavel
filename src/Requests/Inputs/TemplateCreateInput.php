<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TemplateCreateInput */
class TemplateCreateInput
{
	public function __construct(public string $type, public string $name, public string $templateData, public ?string $id = null, public ?string $teamId = null, public ?string $description = null)
	{
	}
}
