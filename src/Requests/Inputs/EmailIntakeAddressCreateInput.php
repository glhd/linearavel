<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/EmailIntakeAddressCreateInput */
class EmailIntakeAddressCreateInput
{
	public function __construct(public ?string $id = null, public ?string $teamId = null, public ?string $templateId = null)
	{
	}
}
