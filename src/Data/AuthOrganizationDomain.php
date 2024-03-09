<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AuthOrganizationDomain extends Data
{
	function __construct(
		public Optional|string $id,
		public Optional|string $organizationId,
		public Optional|string $name,
		public Optional|bool $verified,
		public Optional|bool|null $claimed,
		public Optional|OrganizationDomainAuthType $authType
	) {
	}
}
