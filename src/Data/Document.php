<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/Document */
class Document extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $title,
		public Optional|string $slugId,
		public Optional|float $sortOrder,
		public Optional|CommentConnection $comments,
		public Optional|UserConnection $subscribers,
		public Optional|string $url,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $summary,
		public Optional|string|null $icon,
		public Optional|string|null $color,
		public Optional|User|null $creator,
		public Optional|User|null $owner,
		public Optional|User|null $updatedBy,
		public Optional|Project|null $project,
		public Optional|Initiative|null $initiative,
		public Optional|Team|null $team,
		public Optional|Issue|null $issue,
		public Optional|Release|null $release,
		public Optional|Cycle|null $cycle,
		public Optional|Template|null $lastAppliedTemplate,
		#[LinearDate]
		public Optional|CarbonImmutable|null $hiddenAt,
		public Optional|bool|null $trashed,
		public Optional|string|null $content,
		public Optional|string|null $contentState,
		public Optional|string|null $documentContentId
	) {
	}
}
