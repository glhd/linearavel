<?php

namespace Glhd\Linearavel\Requests\Inputs;

class EmailIntakeAddressCreateInput
{
	function __construct(public ?string $id = null, public ?string $teamId = null, public ?string $templateId = null)
	{
	}
}
