<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\OrganizationDomainAuthType;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OrganizationDomain extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		public Optional|bool $verified,
		public Optional|OrganizationDomainAuthType $authType,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $verificationEmail,
		public Optional|User|null $creator,
		public Optional|bool|null $claimed
	) {
	}
}