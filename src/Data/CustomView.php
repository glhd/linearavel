<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/CustomView */
class CustomView extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		public Optional|Organization $organization,
		public Optional|User $creator,
		public Optional|User $owner,
		public Optional|string $filters,
		public Optional|string $filterData,
		public Optional|bool $shared,
		public Optional|string $slugId,
		public Optional|string $modelName,
		public Optional|ProjectConnection $projects,
		public Optional|IssueConnection $issues,
		public Optional|FeedItemConnection $updates,
		public Optional|InitiativeConnection $initiatives,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $description,
		public Optional|string|null $icon,
		public Optional|string|null $color,
		public Optional|User|null $updatedBy,
		public Optional|string|null $projectFilterData,
		public Optional|string|null $initiativeFilterData,
		public Optional|string|null $feedItemFilterData,
		public Optional|Facet|null $facet,
		public Optional|Team|null $team,
		public Optional|ViewPreferences|null $userViewPreferences,
		public Optional|ViewPreferences|null $organizationViewPreferences,
		public Optional|ViewPreferencesValues|null $viewPreferencesValues
	) {
	}
}
