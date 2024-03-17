<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueRelation extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $type,
		public Optional|Issue $issue,
		public Optional|Issue $relatedIssue,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt
	) {
	}
}
