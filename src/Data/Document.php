<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Document extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $title,
		public Optional|User $creator,
		public Optional|User $updatedBy,
		public Optional|Project $project,
		public Optional|string $slugId,
		public Optional|float $sortOrder,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $icon,
		public Optional|string|null $color,
		public Optional|Template|null $lastAppliedTemplate,
		public Optional|string|null $content,
		public Optional|string|null $contentState,
		public Optional|string|null $contentData
	) {
	}
}
