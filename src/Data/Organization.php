<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\Day;
use Glhd\Linearavel\Data\Enums\FeedSummarySchedule;
use Glhd\Linearavel\Data\Enums\ProjectUpdateReminderFrequency;
use Glhd\Linearavel\Data\Enums\ReleaseChannel;
use Glhd\Linearavel\Data\Enums\SLADayCountType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
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
		/** @var Collection<int, Facet> */
		public Optional|Collection $facets,
		public Optional|bool $gitLinkbackMessagesEnabled,
		public Optional|bool $gitPublicLinkbackMessagesEnabled,
		public Optional|bool $gitLinkbackDescriptionsEnabled,
		public Optional|bool $roadmapEnabled,
		public Optional|Day $projectUpdateRemindersDay,
		public Optional|float $projectUpdateRemindersHour,
		public Optional|Day $initiativeUpdateRemindersDay,
		public Optional|float $initiativeUpdateRemindersHour,
		public Optional|float $fiscalYearStartMonth,
		/** @var Collection<int, float> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $workingDays,
		public Optional|bool $samlEnabled,
		public Optional|bool $scimEnabled,
		public Optional|string $securitySettings,
		public Optional|string $authSettings,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $allowedAuthServices,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $previousUrlKeys,
		public Optional|bool $hipaaComplianceEnabled,
		public Optional|ReleaseChannel $releaseChannel,
		public Optional|string $customersConfiguration,
		public Optional|bool $codeIntelligenceEnabled,
		public Optional|bool $feedEnabled,
		public Optional|bool $hideNonPrimaryOrganizations,
		public Optional|bool $aiAddonEnabled,
		public Optional|bool $agentAutomationEnabled,
		public Optional|bool $generatedUpdatesEnabled,
		public Optional|bool $aiTelemetryEnabled,
		public Optional|bool $aiThreadSummariesEnabled,
		public Optional|bool $aiDiscussionSummariesEnabled,
		public Optional|bool $pullRequestTourEnabled,
		public Optional|string $pullRequestIssueMode,
		public Optional|bool $linearAgentEnabled,
		public Optional|string $linearAgentSettings,
		public Optional|bool $codingAgentEnabled,
		public Optional|string $codingAgentSettings,
		public Optional|SLADayCountType $slaDayCount,
		public Optional|ProjectUpdateReminderFrequency $projectUpdatesReminderFrequency,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $allowedAiProviders,
		public Optional|UserConnection $users,
		public Optional|TeamConnection $teams,
		/** @var Collection<int, ProjectStatus> */
		public Optional|Collection $projectStatuses,
		public Optional|IntegrationConnection $integrations,
		public Optional|string $slackProjectChannelPrefix,
		public Optional|bool $slackProjectChannelsEnabled,
		public Optional|bool $slackAutoCreateProjectChannel,
		public Optional|int $userCount,
		public Optional|int $createdIssueCount,
		public Optional|TemplateConnection $templates,
		public Optional|IssueLabelConnection $labels,
		public Optional|ProjectLabelConnection $projectLabels,
		public Optional|int $customerCount,
		public Optional|bool $customersEnabled,
		public Optional|bool $releasesEnabled,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $logoUrl,
		public Optional|string|null $gitBranchFormat,
		public Optional|float|null $projectUpdateReminderFrequencyInWeeks,
		public Optional|float|null $initiativeUpdateReminderFrequencyInWeeks,
		public Optional|string|null $defaultHomeView,
		public Optional|string|null $defaultHomeViewTargetId,
		public Optional|string|null $samlSettings,
		public Optional|string|null $scimSettings,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection|null $allowedFileUploadContentTypes,
		/** @var Collection<int, OrganizationIpRestriction> */
		public Optional|Collection|null $ipRestrictions,
		#[LinearDate]
		public Optional|CarbonImmutable|null $deletionRequestedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $trialEndsAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $trialStartsAt,
		public Optional|bool|null $restrictAgentInvocationToMembers,
		public Optional|string|null $themeSettings,
		public Optional|string|null $codeIntelligenceRepository,
		public Optional|FeedSummarySchedule|null $defaultFeedSummarySchedule,
		public Optional|string|null $aiProviderConfiguration,
		public Optional|Integration|null $slackProjectChannelIntegration,
		public Optional|PaidSubscription|null $subscription,
		public Optional|bool|null $allowMembersToInvite,
		public Optional|bool|null $restrictTeamCreationToAdmins,
		public Optional|bool|null $restrictLabelManagementToAdmins
	) {
	}
}
