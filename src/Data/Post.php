<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\FeedSummarySchedule;
use Glhd\Linearavel\Data\Enums\PostType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/Post */
class Post extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $body,
		public Optional|string $bodyData,
		public Optional|string $slugId,
		public Optional|string $reactionData,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $writtenSummaryData,
		public Optional|string|null $audioSummary,
		public Optional|string|null $title,
		public Optional|User|null $creator,
		#[LinearDate]
		public Optional|CarbonImmutable|null $editedAt,
		public Optional|string|null $ttlUrl,
		public Optional|User|null $user,
		public Optional|Team|null $team,
		public Optional|PostType|null $type,
		public Optional|string|null $evalLogId,
		public Optional|FeedSummarySchedule|null $feedSummaryScheduleAtCreate
	) {
	}
}
