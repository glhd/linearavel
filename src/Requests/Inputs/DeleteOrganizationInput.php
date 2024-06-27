<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/DeleteOrganizationInput */
class DeleteOrganizationInput
{
	public function __construct(public string $deletionCode)
	{
	}
}
