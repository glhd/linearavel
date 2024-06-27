<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TemplateUpdateInput */
class TemplateUpdateInput
{
	public function __construct(public ?string $name = null, public ?string $description = null, public ?string $teamId = null, public ?string $templateData = null)
	{
	}
}
