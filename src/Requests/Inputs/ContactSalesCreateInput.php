<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ContactSalesCreateInput */
class ContactSalesCreateInput
{
	public function __construct(public string $name, public string $email, public ?string $companySize = null, public ?string $message = null)
	{
	}
}
