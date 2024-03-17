<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\OrganizationDomainAuthType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OrganizationDomain extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate] public Optional|CarbonImmutable $createdAt,
		#[LinearDate] public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		public Optional|bool $verified,
		public Optional|OrganizationDomainAuthType $authType,
		#[LinearDate] public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $verificationEmail,
		public Optional|User|null $creator,
		public Optional|bool|null $claimed
	) {
	}
}
