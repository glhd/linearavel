<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/CreateOrJoinOrganizationResponse */
class CreateOrJoinOrganizationResponse extends Data
{
	public function __construct(public Optional|AuthOrganization $organization, public Optional|AuthUser $user)
	{
	}
}
