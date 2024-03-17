<?php

namespace Glhd\Linearavel\Requests\Inputs;

class DeleteOrganizationInput
{
	public function __construct(public string $deletionCode)
	{
	}
}
