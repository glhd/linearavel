<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Carbon\CarbonImmutable, Glhd\Linearavel\Data\Enums\ProjectStatusType, Glhd\Linearavel\Data\Contracts\Node;

class ProjectStatus extends Data implements Node
{
	function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt = null,
		public Optional|string $name,
		public Optional|string $color,
		public Optional|string|null $description = null,
		public Optional|float $position,
		public Optional|ProjectStatusType|null $type = null,
		public Optional|bool $indefinite
	) {
	}
}
