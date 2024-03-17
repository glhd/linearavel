<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CreateOrJoinOrganizationResponse extends Data
{
	public function __construct(public Optional|AuthOrganization $organization, public Optional|AuthUser $user)
	{
	}
}
