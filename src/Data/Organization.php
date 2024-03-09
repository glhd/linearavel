<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Node;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Organization extends Data implements Node
{
	function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string $name,
		public Optional|string $urlKey,
		public Optional|string|null $logoUrl,
		public Optional|float $periodUploadVolume,
		public Optional|string|null $gitBranchFormat,
		public Optional|bool $gitLinkbackMessagesEnabled,
		public Optional|bool $gitPublicLinkbackMessagesEnabled,
		public Optional|bool $roadmapEnabled,
		public Optional|ProjectUpdateReminderFrequency $projectUpdatesReminderFrequency,
		public Optional|Day $projectUpdateRemindersDay,
		public Optional|float $projectUpdateRemindersHour,
		public Optional|float $fiscalYearStartMonth,
		public Optional|bool $samlEnabled,
		public Optional|JSONObject|null $samlSettings,
		public Optional|bool $scimEnabled,
		/** @var Collection<int, string> */
		public Collection $allowedAuthServices,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $deletionRequestedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $trialEndsAt,
		/** @var Collection<int, string> */
		public Collection $previousUrlKeys,
		public Optional|bool|null $allowMembersToInvite,
		public Optional|ReleaseChannel $releaseChannel,
		public Optional|SLADayCountType $slaDayCount,
		public Optional|UserConnection $users,
		public Optional|TeamConnection $teams,
		public Optional|IntegrationConnection $integrations,
		public Optional|PaidSubscription|null $subscription,
		public Optional|int $userCount,
		public Optional|int $createdIssueCount,
		public Optional|TemplateConnection $templates,
		public Optional|IssueLabelConnection $labels
	) {
	}
}
