<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\UserRoleType;
use Illuminate\Support\Collection;

class OrganizationInviteCreateInput
{
	public function __construct(
		public string $email,
		/** @var Collection<int, string> */
		public Collection $teamIds,
		public ?string $id = null,
		public ?UserRoleType $role = null,
		public ?string $message = null,
		public ?string $metadata = null
	) {
	}
}
