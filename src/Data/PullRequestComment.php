<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\PullRequestReviewerDecision;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/PullRequestComment */
class PullRequestComment extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $bodyData,
		public Optional|string $reactionData,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $externalThreadId,
		public Optional|string|null $externalReviewId,
		public Optional|PullRequestReviewerDecision|null $decision,
		#[LinearDate]
		public Optional|CarbonImmutable|null $editedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $resolvedAt,
		public Optional|string|null $pendingReviewId
	) {
	}
}
