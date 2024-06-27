<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\UserRoleType;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OrganizationInviteCreateInput */
class OrganizationInviteCreateInput
{
	public function __construct(
		public string $email,
		public ?string $id = null,
		public ?UserRoleType $role = null,
		public ?string $message = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $teamIds = null,
		public ?string $metadata = null
	) {
	}
}
