<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\Day;
use Glhd\Linearavel\Data\Enums\FeedSummarySchedule;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OrganizationUpdateInput */
class OrganizationUpdateInput
{
	public function __construct(
		public ?string $name = null,
		public ?string $logoUrl = null,
		public ?string $urlKey = null,
		public ?string $gitBranchFormat = null,
		public ?bool $gitLinkbackMessagesEnabled = null,
		public ?bool $gitPublicLinkbackMessagesEnabled = null,
		public ?bool $gitLinkbackDescriptionsEnabled = null,
		public ?bool $suggestedBranchNameEnabled = null,
		public ?bool $roadmapEnabled = null,
		public ?float $projectUpdateReminderFrequencyInWeeks = null,
		public ?Day $projectUpdateRemindersDay = null,
		public ?float $projectUpdateRemindersHour = null,
		public ?float $initiativeUpdateReminderFrequencyInWeeks = null,
		public ?Day $initiativeUpdateRemindersDay = null,
		public ?float $initiativeUpdateRemindersHour = null,
		public ?float $fiscalYearStartMonth = null,
		public ?string $defaultHomeView = null,
		public ?string $defaultHomeViewTargetId = null,
		public ?bool $reducedPersonalInformation = null,
		public ?bool $oauthAppReview = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $allowedAuthServices = null,
		public ?bool $allowMembersToInvite = null,
		public ?bool $restrictTeamCreationToAdmins = null,
		public ?bool $restrictLabelManagementToAdmins = null,
		public ?bool $restrictAgentInvocationToMembers = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $allowedFileUploadContentTypes = null,
		public ?bool $feedEnabled = null,
		public ?bool $hideNonPrimaryOrganizations = null,
		public ?FeedSummarySchedule $defaultFeedSummarySchedule = null,
		public ?bool $personalApiKeysEnabled = null,
		public ?bool $aiDiscussionSummariesEnabled = null,
		public ?bool $aiThreadSummariesEnabled = null,
		public ?bool $pullRequestTourEnabled = null,
		public ?string $pullRequestIssueMode = null,
		public ?bool $hipaaComplianceEnabled = null,
		public ?OrganizationSecuritySettingsInput $securitySettings = null,
		public ?OrganizationAuthSettingsInput $authSettings = null,
		public ?string $slackProjectChannelIntegrationId = null,
		public ?string $slackProjectChannelPrefix = null
	) {
	}
}
