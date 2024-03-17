<?php

namespace Glhd\Linearavel\Requests\Inputs;

class CreateOrganizationInput
{
	function __construct(public string $name, public string $urlKey, public ?bool $domainAccess = null, public ?string $timezone = null, public ?string $utm = null)
	{
	}
}
