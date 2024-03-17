<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DocumentContent extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate] public Optional|CarbonImmutable $createdAt,
		#[LinearDate] public Optional|CarbonImmutable $updatedAt,
		#[LinearDate] public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $content,
		public Optional|string|null $contentData,
		public Optional|string|null $contentState,
		public Optional|Issue|null $issue,
		public Optional|Project|null $project,
		public Optional|ProjectMilestone|null $projectMilestone,
		public Optional|Document|null $document,
		#[LinearDate] public Optional|CarbonImmutable|null $restoredAt
	) {
	}
}
