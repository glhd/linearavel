<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuthResolverResponse extends Data
{
	function __construct(
		public Optional|string $id,
		public Optional|string $email,
		public Optional|bool|null $allowDomainAccess,
		/** @var Collection<int, AuthUser> */
		public Collection $users,
		/** @var Collection<int, AuthOrganization> */
		public Collection $availableOrganizations,
		/** @var Collection<int, AuthOrganization> */
		public Collection $lockedOrganizations,
		public Optional|string|null $lastUsedOrganizationId,
		public Optional|string|null $token
	) {
	}
}