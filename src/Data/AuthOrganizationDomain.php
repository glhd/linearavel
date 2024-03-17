<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Enums\OrganizationDomainAuthType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuthOrganizationDomain extends Data
{
	public function __construct(
		public Optional|string $id,
		public Optional|string $organizationId,
		public Optional|string $name,
		public Optional|bool $verified,
		public Optional|OrganizationDomainAuthType $authType,
		public Optional|bool|null $claimed = null
	) {
	}
}
