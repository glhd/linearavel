<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/Template */
class Template extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $type,
		public Optional|string $name,
		public Optional|string $templateData,
		public Optional|float $sortOrder,
		public Optional|Organization $organization,
		public Optional|bool $hasFormFields,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $description,
		public Optional|string|null $icon,
		public Optional|string|null $color,
		#[LinearDate]
		public Optional|CarbonImmutable|null $lastAppliedAt,
		public Optional|Team|null $team,
		public Optional|ReleasePipeline|null $pipeline,
		public Optional|User|null $creator,
		public Optional|User|null $lastUpdatedBy,
		public Optional|Template|null $inheritedFrom,
		public Optional|string|null $content
	) {
	}
}
