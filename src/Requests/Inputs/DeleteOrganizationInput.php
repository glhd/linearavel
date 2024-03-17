<?php

namespace Glhd\Linearavel\Requests\Inputs;

class DeleteOrganizationInput
{
	function __construct(public string $deletionCode)
	{
	}
}
