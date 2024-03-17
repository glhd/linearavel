<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DocumentContent extends Data implements Node
{
	function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt = null,
		public Optional|string|null $content = null,
		public Optional|string|null $contentData = null,
		public Optional|string|null $contentState = null,
		public Optional|Issue|null $issue = null,
		public Optional|Project|null $project = null,
		public Optional|ProjectMilestone|null $projectMilestone = null,
		public Optional|Document|null $document = null,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $restoredAt = null
	) {
	}
}
