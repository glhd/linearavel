<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Carbon\CarbonImmutable, Glhd\Linearavel\Data\Template, Glhd\Linearavel\Data\Integration, Glhd\Linearavel\Data\Contracts\Node;

class IntegrationTemplate extends Data implements Node
{
	function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt = null,
		public Optional|Template $template,
		public Optional|Integration $integration,
		public Optional|string|null $foreignEntityId = null
	) {
	}
}
