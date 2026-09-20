<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\IssueSuggestionState;
use Glhd\Linearavel\Data\Enums\IssueSuggestionType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueSuggestion */
class IssueSuggestion extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|Issue $issue,
		public Optional|string $issueId,
		public Optional|IssueSuggestionType $type,
		public Optional|IssueSuggestionState $state,
		#[LinearDate]
		public Optional|CarbonImmutable $stateChangedAt,
		/** @var Collection<int, PresentedIssueSuggestionReason> */
		public Optional|Collection $presentedReasons,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $dismissalReason,
		public Optional|IssueSuggestionMetadata|null $metadata,
		public Optional|Issue|null $suggestedIssue,
		public Optional|string|null $suggestedIssueId,
		public Optional|Team|null $suggestedTeam,
		public Optional|Project|null $suggestedProject,
		public Optional|User|null $suggestedUser,
		public Optional|string|null $suggestedUserId,
		public Optional|IssueLabel|null $suggestedLabel,
		public Optional|string|null $suggestedLabelId
	) {
	}
}
