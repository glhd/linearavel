<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuthUser extends Data
{
	function __construct(
		public Optional|string $id,
		public Optional|string $name,
		public Optional|string $displayName,
		public Optional|string $email,
		public Optional|string|null $avatarUrl,
		public Optional|bool $active,
		public Optional|string $userAccountId,
		public Optional|AuthOrganization $organization
	) {
	}
}
