<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class OrganizationInviteUpdateInput
{
	function __construct(
		/** @var Collection<int, string> */
		public Collection $teamIds
	) {
	}
}
