<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\Day;
use Glhd\Linearavel\Data\Enums\ProjectUpdateReminderFrequency;
use Glhd\Linearavel\Data\Enums\ReleaseChannel;
use Glhd\Linearavel\Data\Enums\SLADayCountType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/Organization */
class Organization extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		public Optional|string $urlKey,
		public Optional|float $periodUploadVolume,
		public Optional|bool $gitLinkbackMessagesEnabled,
		public Optional|bool $gitPublicLinkbackMessagesEnabled,
		public Optional|bool $roadmapEnabled,
		public Optional|ProjectUpdateReminderFrequency $projectUpdatesReminderFrequency,
		public Optional|Day $projectUpdateRemindersDay,
		public Optional|float $projectUpdateRemindersHour,
		public Optional|float $fiscalYearStartMonth,
		public Optional|bool $samlEnabled,
		public Optional|bool $scimEnabled,
		/** @var Collection<int, string> */
		public Optional|Collection $allowedAuthServices,
		/** @var Collection<int, string> */
		public Optional|Collection $previousUrlKeys,
		public Optional|ReleaseChannel $releaseChannel,
		public Optional|SLADayCountType $slaDayCount,
		public Optional|UserConnection $users,
		public Optional|TeamConnection $teams,
		public Optional|IntegrationConnection $integrations,
		public Optional|int $userCount,
		public Optional|int $createdIssueCount,
		public Optional|TemplateConnection $templates,
		public Optional|IssueLabelConnection $labels,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $logoUrl,
		public Optional|string|null $gitBranchFormat,
		public Optional|string|null $samlSettings,
		#[LinearDate]
		public Optional|CarbonImmutable|null $deletionRequestedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $trialEndsAt,
		public Optional|bool|null $allowMembersToInvite,
		public Optional|PaidSubscription|null $subscription
	) {
	}
}
