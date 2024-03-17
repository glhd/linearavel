<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DocumentSearchResult extends Data implements Node
{
	function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt = null,
		public Optional|string $title,
		public Optional|string|null $icon = null,
		public Optional|string|null $color = null,
		public Optional|User $creator,
		public Optional|User $updatedBy,
		public Optional|Project $project,
		public Optional|string $slugId,
		public Optional|Template|null $lastAppliedTemplate = null,
		public Optional|float $sortOrder,
		public Optional|string|null $content = null,
		public Optional|string|null $contentState = null,
		public Optional|string|null $contentData = null,
		public Optional|string $metadata
	) {
	}
}
