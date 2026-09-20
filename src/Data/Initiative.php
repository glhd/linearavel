<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\DateResolutionType;
use Glhd\Linearavel\Data\Enums\Day;
use Glhd\Linearavel\Data\Enums\FrequencyResolutionType;
use Glhd\Linearavel\Data\Enums\InitiativeStatus;
use Glhd\Linearavel\Data\Enums\InitiativeUpdateHealthType;
use Glhd\Linearavel\Data\Enums\InitiativeVisibility;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/Initiative */
class Initiative extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|FrequencyResolutionType $frequencyResolution,
		public Optional|string $name,
		public Optional|Organization $organization,
		public Optional|string $slugId,
		public Optional|float $sortOrder,
		/** @var Collection<int, Facet> */
		public Optional|Collection $facets,
		public Optional|InitiativeStatus $status,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $labelIds,
		public Optional|int $priority,
		public Optional|float $prioritySortOrder,
		public Optional|string $url,
		public Optional|InitiativeVisibility $visibility,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $previousIdentifiers,
		public Optional|ProjectConnection $projects,
		public Optional|EntityExternalLinkConnection $links,
		public Optional|InitiativeHistoryConnection $history,
		public Optional|InitiativeUpdateConnection $initiativeUpdates,
		public Optional|InitiativeConnection $subInitiatives,
		public Optional|InitiativeConnection $parentInitiatives,
		public Optional|DocumentConnection $documents,
		public Optional|InitiativeLabelConnection $labels,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|float|null $updateReminderFrequencyInWeeks,
		public Optional|float|null $updateReminderFrequency,
		public Optional|Day|null $updateRemindersDay,
		public Optional|float|null $updateRemindersHour,
		public Optional|string|null $description,
		public Optional|User|null $creator,
		public Optional|User|null $owner,
		public Optional|Team|null $leadTeam,
		public Optional|string|null $color,
		public Optional|string|null $icon,
		public Optional|bool|null $trashed,
		public Optional|string|null $targetDate,
		public Optional|DateResolutionType|null $targetDateResolution,
		public Optional|InitiativeUpdate|null $lastUpdate,
		public Optional|InitiativeUpdateHealthType|null $health,
		#[LinearDate]
		public Optional|CarbonImmutable|null $healthUpdatedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $startedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $completedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $canceledAt,
		public Optional|string|null $identifier,
		public Optional|IntegrationsSettings|null $integrationsSettings,
		public Optional|Initiative|null $parentInitiative,
		public Optional|string|null $content,
		public Optional|DocumentContent|null $documentContent
	) {
	}
}
