<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OrganizationInviteUpdateInput */
class OrganizationInviteUpdateInput
{
	public function __construct(
		/** @var iterable<string>|Collection<int, string> */
		public iterable $teamIds
	) {
	}
}
