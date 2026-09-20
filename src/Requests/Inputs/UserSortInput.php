<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/UserSortInput */
class UserSortInput
{
	public function __construct(public ?UserNameSortInput $name = null, public ?UserDisplayNameSortInput $displayName = null)
	{
	}
}
