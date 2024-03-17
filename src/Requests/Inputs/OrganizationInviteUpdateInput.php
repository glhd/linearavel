<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class OrganizationInviteUpdateInput
{
	public function __construct(
		/** @var iterable<string>|Collection<int, string> */
		public iterable $teamIds
	) {
	}
}
