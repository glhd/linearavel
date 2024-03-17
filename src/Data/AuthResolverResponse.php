<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuthResolverResponse extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|string $email,
		/** @var Collection<int, AuthUser> */
		public Optional|Collection $users,
		public Optional|bool|null $allowDomainAccess,
		/** @var Collection<int, AuthOrganization> */
		public Optional|Collection|null $availableOrganizations,
		/** @var Collection<int, AuthOrganization> */
		public Optional|Collection|null $lockedOrganizations,
		public Optional|string|null $lastUsedOrganizationId,
		public Optional|string|null $token
	) {
	}
}
