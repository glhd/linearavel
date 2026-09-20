<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\FacetPageSource;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/Facet */
class Facet extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|float $sortOrder,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|Organization|null $sourceOrganization,
		public Optional|Team|null $sourceTeam,
		public Optional|Project|null $sourceProject,
		public Optional|Initiative|null $sourceInitiative,
		public Optional|User|null $sourceFeedUser,
		public Optional|FacetPageSource|null $sourcePage,
		public Optional|CustomView|null $targetCustomView
	) {
	}
}
