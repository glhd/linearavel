<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProductAnnouncement */
class ProductAnnouncement extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $campaignId,
		public Optional|string $kind,
		public Optional|string $title,
		public Optional|string $headline,
		public Optional|string $description,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt
	) {
	}
}
