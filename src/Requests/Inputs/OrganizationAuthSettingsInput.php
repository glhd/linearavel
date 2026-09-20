<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OrganizationAuthSettingsInput */
class OrganizationAuthSettingsInput
{
	public function __construct(
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $allowedAuthServices = null,
		public ?string $allowedAuthServiceBypassRole = null,
		public ?bool $hideNonPrimaryOrganizations = null,
		public ?bool $disableAuthServiceBypass = null
	) {
	}
}
