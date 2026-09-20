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
		/** @var iterable<float>|Collection<int, float> */
		public ?iterable $workingDays = null,
		public ?bool $reducedPersonalInformation = null,
		public ?bool $oauthAppReview = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $allowedAuthServices = null,
		public ?bool $slaEnabled = null,
		public ?bool $allowMembersToInvite = null,
		public ?bool $restrictTeamCreationToAdmins = null,
		public ?bool $restrictLabelManagementToAdmins = null,
		public ?bool $restrictAgentInvocationToMembers = null,
		/** @var iterable<OrganizationIpRestrictionInput>|Collection<int, OrganizationIpRestrictionInput> */
		public ?iterable $ipRestrictions = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $allowedFileUploadContentTypes = null,
		public ?OrganizationThemeSettingsInput $themeSettings = null,
		public ?bool $customersEnabled = null,
		public ?CustomersConfigurationInput $customersConfiguration = null,
		public ?bool $codeIntelligenceEnabled = null,
		public ?string $codeIntelligenceRepository = null,
		public ?bool $feedEnabled = null,
		public ?bool $hideNonPrimaryOrganizations = null,
		public ?FeedSummarySchedule $defaultFeedSummarySchedule = null,
		public ?bool $aiAddonEnabled = null,
		public ?bool $agentAutomationEnabled = null,
		public ?bool $generatedUpdatesEnabled = null,
		public ?bool $aiTelemetryEnabled = null,
		public ?bool $personalApiKeysEnabled = null,
		public ?bool $aiDiscussionSummariesEnabled = null,
		public ?bool $aiThreadSummariesEnabled = null,
		public ?bool $pullRequestTourEnabled = null,
		public ?string $pullRequestIssueMode = null,
		public ?bool $hipaaComplianceEnabled = null,
		public ?OrganizationSecuritySettingsInput $securitySettings = null,
		public ?OrganizationAuthSettingsInput $authSettings = null,
		public ?string $slackProjectChannelIntegrationId = null,
		public ?string $slackProjectChannelPrefix = null,
		public ?bool $slackProjectChannelsEnabled = null,
		public ?bool $slackAutoCreateProjectChannel = null,
		public ?bool $linearAgentEnabled = null,
		public ?OrganizationLinearAgentSettingsInput $linearAgentSettings = null,
		public ?bool $codingAgentEnabled = null,
		public ?OrganizationCodingAgentSettingsInput $codingAgentSettings = null
	) {
	}
}
