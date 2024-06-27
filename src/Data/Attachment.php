<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/Attachment */
class Attachment extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $title,
		public Optional|string $url,
		public Optional|string $metadata,
		public Optional|bool $groupBySource,
		public Optional|Issue $issue,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $subtitle,
		public Optional|User|null $creator,
		public Optional|ExternalUser|null $externalUserCreator,
		public Optional|string|null $source,
		public Optional|string|null $sourceType
	) {
	}
}
