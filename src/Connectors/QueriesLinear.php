<?php

namespace Glhd\Linearavel\Connectors;

use Glhd\Linearavel\Data\Enums\IdentityProviderType;
use Glhd\Linearavel\Data\Enums\PaginationOrderBy;
use Glhd\Linearavel\Data\Enums\SendStrategy;
use Glhd\Linearavel\Data\Enums\ViewType;
use Glhd\Linearavel\Requests\Inputs\AgentActivityFilterInput;
use Glhd\Linearavel\Requests\Inputs\AgentSkillFilterInput;
use Glhd\Linearavel\Requests\Inputs\AttachmentFilterInput;
use Glhd\Linearavel\Requests\Inputs\AuditEntryFilterInput;
use Glhd\Linearavel\Requests\Inputs\CommentFilterInput;
use Glhd\Linearavel\Requests\Inputs\CustomerFilterInput;
use Glhd\Linearavel\Requests\Inputs\CustomerNeedFilterInput;
use Glhd\Linearavel\Requests\Inputs\CustomViewFilterInput;
use Glhd\Linearavel\Requests\Inputs\CycleFilterInput;
use Glhd\Linearavel\Requests\Inputs\DocumentFilterInput;
use Glhd\Linearavel\Requests\Inputs\EmojiFilterInput;
use Glhd\Linearavel\Requests\Inputs\InitiativeFilterInput;
use Glhd\Linearavel\Requests\Inputs\InitiativeLabelFilterInput;
use Glhd\Linearavel\Requests\Inputs\InitiativeUpdateFilterInput;
use Glhd\Linearavel\Requests\Inputs\IssueFilterInput;
use Glhd\Linearavel\Requests\Inputs\IssueLabelFilterInput;
use Glhd\Linearavel\Requests\Inputs\NotificationFilterInput;
use Glhd\Linearavel\Requests\Inputs\ProjectFilterInput;
use Glhd\Linearavel\Requests\Inputs\ProjectLabelFilterInput;
use Glhd\Linearavel\Requests\Inputs\ProjectMilestoneFilterInput;
use Glhd\Linearavel\Requests\Inputs\ProjectUpdateFilterInput;
use Glhd\Linearavel\Requests\Inputs\ReleaseFilterInput;
use Glhd\Linearavel\Requests\Inputs\ReleaseNoteFilterInput;
use Glhd\Linearavel\Requests\Inputs\ReleasePipelineFilterInput;
use Glhd\Linearavel\Requests\Inputs\ReleaseStageFilterInput;
use Glhd\Linearavel\Requests\Inputs\SemanticSearchFiltersInput;
use Glhd\Linearavel\Requests\Inputs\TeamFilterInput;
use Glhd\Linearavel\Requests\Inputs\TemplateFilterInput;
use Glhd\Linearavel\Requests\Inputs\UsageAlertFilterInput;
use Glhd\Linearavel\Requests\Inputs\UserFilterInput;
use Glhd\Linearavel\Requests\Inputs\WorkflowStateFilterInput;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAdministrableTeamsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAgentActivitiesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAgentActivityQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAgentSessionQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAgentSessionSandboxQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAgentSessionsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAgentSessionSshAddressQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAgentSkillQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAgentSkillsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingApplicationInfoQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingArchivedIntegrationsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingArchivedTeamsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAttachmentIssueQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAttachmentQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAttachmentsForURLQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAttachmentSourcesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAttachmentsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAuditEntriesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAuditEntryTypesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAuditLogWebhookFailureEventsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAuthenticationSessionsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAvailableUsersQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCommentQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCommentsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomerNeedQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomerNeedsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomerQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomersQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomerStatusesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomerStatusQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomerTierQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomerTiersQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomViewDetailsSuggestionQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomViewHasSubscribersQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomViewQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomViewsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCycleQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCyclesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingDependencyPackageMetadataQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingDiffQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingDocumentContentHistoryEntriesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingDocumentContentHistoryQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingDocumentContentHistoryTimelineQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingDocumentQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingDocumentsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingEmailIntakeAddressQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingEmojiQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingEmojisQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingEntityExternalLinkQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingExternalUserQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingExternalUsersQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingFailuresForOauthWebhooksQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingFavoriteQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingFavoritesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInboxNotificationsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeFilterSuggestionQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeLabelQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeLabelsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeLeadTeamChangeImpactQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeRelationQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeRelationsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeToProjectQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeToProjectsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeUpdateQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeUpdatesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIntegrationHasScopesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIntegrationJiraProjectStatusesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIntegrationQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIntegrationsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIntegrationsSettingsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIntegrationTemplateQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIntegrationTemplatesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueFigmaFileKeySearchQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueFilterSuggestionQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueImportCheckCSVQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueImportCheckSyncQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueImportJqlCheckQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueLabelQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueLabelsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssuePriorityValuesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueRelationQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueRelationsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueRepositorySuggestionsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueSearchQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssuesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueTitleSuggestionFromCustomerRequestQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueToReleaseQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueToReleasesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueVcsBranchSearchQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingLatestReleaseByAccessKeyQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingMicrosoftTeamsChannelsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingNotificationQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingNotificationsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingNotificationSubscriptionQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingNotificationSubscriptionsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingNotificationsUnreadCountQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOauthApplicationQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOauthApplicationsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOrganizationDomainClaimRequestQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOrganizationExistsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOrganizationInviteDetailsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOrganizationInviteQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOrganizationInvitesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOrganizationMetaQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOrganizationQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingPartnerOfferDetailsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingPartnerOfferWorkspacesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingPartnerProgramPartnersQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectFilterSuggestionQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectLabelQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectLabelsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectMilestoneQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectMilestonesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectRelationQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectRelationsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectStatusesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectStatusProjectCountQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectStatusQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectUpdateQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectUpdatesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingPushSubscriptionTestQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingRateLimitStatusQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingRecentReleasesByAccessKeyQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingReleaseNoteQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingReleaseNotesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingReleasePipelineByAccessKeyQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingReleasePipelineQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingReleasePipelinesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingReleaseQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingReleaseSearchQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingReleasesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingReleaseStageQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingReleaseStagesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingRoadmapQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingRoadmapsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingRoadmapToProjectQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingRoadmapToProjectsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingSearchDocumentsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingSearchIssuesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingSearchProjectsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingSemanticSearchQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingSlaConfigurationsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingSsoUrlFromEmailQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTeamMembershipQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTeamMembershipsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTeamQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTeamsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTemplateQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTemplateSearchQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTemplatesForIntegrationQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTemplatesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTimeScheduleQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTimeSchedulesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTriageResponsibilitiesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTriageResponsibilityQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingUsageAlertQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingUsageAlertsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingUserQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingUserSessionsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingUserSettingsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingUsersQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingUserViewPreferencesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingVerifyGitHubEnterpriseServerInstallationQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingViewerQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingWebhookQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingWebhooksQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingWorkflowStateQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingWorkflowStatesQueryRequest;

trait QueriesLinear
{
	/**
	 * @param ?ProjectFilterInput $filter filter returned projects
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param ?iterable $sort [INTERNAL] Sort returned projects
	 * @returns PendingProjectsQueryRequest
	 */
	public function projects(?ProjectFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?iterable $sort = null): PendingProjectsQueryRequest
	{
		return new PendingProjectsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'sort' => $sort]);
	}

	/**
	 * @param string $id
	 * @returns PendingProjectQueryRequest
	 */
	public function project(string $id): PendingProjectQueryRequest
	{
		return new PendingProjectQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $teamId [Internal] The ID of the team if filtering a team view
	 * @param string $prompt
	 * @returns PendingProjectFilterSuggestionQueryRequest
	 */
	public function projectFilterSuggestion(string $prompt, ?string $teamId = null): PendingProjectFilterSuggestionQueryRequest
	{
		return new PendingProjectFilterSuggestionQueryRequest($this, ['prompt' => $prompt, 'teamId' => $teamId]);
	}

	/**
	 * @param ?AgentActivityFilterInput $filter filter returned agent activities
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingAgentActivitiesQueryRequest
	 */
	public function agentActivities(?AgentActivityFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingAgentActivitiesQueryRequest
	{
		return new PendingAgentActivitiesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the agent activity to retrieve
	 * @returns PendingAgentActivityQueryRequest
	 */
	public function agentActivity(string $id): PendingAgentActivityQueryRequest
	{
		return new PendingAgentActivityQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingAgentSessionsQueryRequest
	 */
	public function agentSessions(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingAgentSessionsQueryRequest
	{
		return new PendingAgentSessionsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the agent session to retrieve
	 * @returns PendingAgentSessionQueryRequest
	 */
	public function agentSession(string $id): PendingAgentSessionQueryRequest
	{
		return new PendingAgentSessionQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param string $agentSessionId the identifier of the agent session
	 * @returns PendingAgentSessionSshAddressQueryRequest
	 */
	public function agentSessionSshAddress(string $agentSessionId): PendingAgentSessionSshAddressQueryRequest
	{
		return new PendingAgentSessionSshAddressQueryRequest($this, ['agentSessionId' => $agentSessionId]);
	}

	/**
	 * @param string $agentSessionId the identifier of the agent session
	 * @returns PendingAgentSessionSandboxQueryRequest
	 */
	public function agentSessionSandbox(string $agentSessionId): PendingAgentSessionSandboxQueryRequest
	{
		return new PendingAgentSessionSandboxQueryRequest($this, ['agentSessionId' => $agentSessionId]);
	}

	/**
	 * @param ?AgentSkillFilterInput $filter Filter returned skills
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingAgentSkillsQueryRequest
	 */
	public function agentSkills(?AgentSkillFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingAgentSkillsQueryRequest
	{
		return new PendingAgentSkillsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the agent skill to retrieve
	 * @returns PendingAgentSkillQueryRequest
	 */
	public function agentSkill(string $id): PendingAgentSkillQueryRequest
	{
		return new PendingAgentSkillQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param string $clientId the client ID of the application
	 * @returns PendingApplicationInfoQueryRequest
	 */
	public function applicationInfo(string $clientId): PendingApplicationInfoQueryRequest
	{
		return new PendingApplicationInfoQueryRequest($this, ['clientId' => $clientId]);
	}

	/**
	 * @param ?AttachmentFilterInput $filter filter returned attachments
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingAttachmentsQueryRequest
	 */
	public function attachments(?AttachmentFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingAttachmentsQueryRequest
	{
		return new PendingAttachmentsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id
	 * @returns PendingAttachmentQueryRequest
	 */
	public function attachment(string $id): PendingAttachmentQueryRequest
	{
		return new PendingAttachmentQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param string $url the attachment URL
	 * @returns PendingAttachmentsForURLQueryRequest
	 */
	public function attachmentsForURL(string $url, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingAttachmentsForURLQueryRequest
	{
		return new PendingAttachmentsForURLQueryRequest($this, ['url' => $url, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id `id` of the attachment for which you'll want to get the issue for. [Deprecated] `url` as the `id` parameter.
	 * @returns PendingAttachmentIssueQueryRequest
	 */
	public function attachmentIssue(string $id): PendingAttachmentIssueQueryRequest
	{
		return new PendingAttachmentIssueQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $teamId (optional) if provided will only return attachment sources for the given team
	 * @returns PendingAttachmentSourcesQueryRequest
	 */
	public function attachmentSources(?string $teamId = null): PendingAttachmentSourcesQueryRequest
	{
		return new PendingAttachmentSourcesQueryRequest($this, ['teamId' => $teamId]);
	}

	/**
	 * @returns PendingAuditEntryTypesQueryRequest
	 */
	public function auditEntryTypes(): PendingAuditEntryTypesQueryRequest
	{
		return new PendingAuditEntryTypesQueryRequest($this, []);
	}

	/**
	 * @param ?AuditEntryFilterInput $filter filter returned audit entries
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingAuditEntriesQueryRequest
	 */
	public function auditEntries(?AuditEntryFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingAuditEntriesQueryRequest
	{
		return new PendingAuditEntriesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @returns PendingAvailableUsersQueryRequest
	 */
	public function availableUsers(): PendingAvailableUsersQueryRequest
	{
		return new PendingAvailableUsersQueryRequest($this, []);
	}

	/**
	 * @returns PendingAuthenticationSessionsQueryRequest
	 */
	public function authenticationSessions(): PendingAuthenticationSessionsQueryRequest
	{
		return new PendingAuthenticationSessionsQueryRequest($this, []);
	}

	/**
	 * @param ?bool $isDesktop whether the client is the desktop app
	 * @param IdentityProviderType $type type of identity provider
	 * @param string $email email to query the SSO login URL by
	 * @returns PendingSsoUrlFromEmailQueryRequest
	 */
	public function ssoUrlFromEmail(IdentityProviderType $type, string $email, ?bool $isDesktop = null): PendingSsoUrlFromEmailQueryRequest
	{
		return new PendingSsoUrlFromEmailQueryRequest($this, ['type' => $type, 'email' => $email, 'isDesktop' => $isDesktop]);
	}

	/**
	 * @param ?CommentFilterInput $filter filter returned comments
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingCommentsQueryRequest
	 */
	public function comments(?CommentFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingCommentsQueryRequest
	{
		return new PendingCommentsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param ?string $id the identifier of the comment to retrieve
	 * @param ?string $issueId [Deprecated] The issue for which to find the comment
	 * @param ?string $hash the hash of the comment to retrieve
	 * @returns PendingCommentQueryRequest
	 */
	public function comment(?string $id = null, ?string $issueId = null, ?string $hash = null): PendingCommentQueryRequest
	{
		return new PendingCommentQueryRequest($this, ['id' => $id, 'issueId' => $issueId, 'hash' => $hash]);
	}

	/**
	 * @param ?CustomViewFilterInput $filter filter returned custom views
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param ?iterable $sort [INTERNAL] Sort returned custom views
	 * @returns PendingCustomViewsQueryRequest
	 */
	public function customViews(?CustomViewFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?iterable $sort = null): PendingCustomViewsQueryRequest
	{
		return new PendingCustomViewsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'sort' => $sort]);
	}

	/**
	 * @param string $id the identifier of the custom view to retrieve
	 * @returns PendingCustomViewQueryRequest
	 */
	public function customView(string $id): PendingCustomViewQueryRequest
	{
		return new PendingCustomViewQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $modelName The entity type the view targets. If null, defaults to "issue". Valid values: "issue", "project", "initiative", "feedItem".
	 * @param string $filter the filter object to generate suggestions for
	 * @returns PendingCustomViewDetailsSuggestionQueryRequest
	 */
	public function customViewDetailsSuggestion(string $filter, ?string $modelName = null): PendingCustomViewDetailsSuggestionQueryRequest
	{
		return new PendingCustomViewDetailsSuggestionQueryRequest($this, ['filter' => $filter, 'modelName' => $modelName]);
	}

	/**
	 * @param string $id the identifier of the custom view
	 * @returns PendingCustomViewHasSubscribersQueryRequest
	 */
	public function customViewHasSubscribers(string $id): PendingCustomViewHasSubscribersQueryRequest
	{
		return new PendingCustomViewHasSubscribersQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?CustomerNeedFilterInput $filter filter returned customer needs
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingCustomerNeedsQueryRequest
	 */
	public function customerNeeds(?CustomerNeedFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingCustomerNeedsQueryRequest
	{
		return new PendingCustomerNeedsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param ?string $id The UUID of the customer need to retrieve. Cannot be used together with hash.
	 * @param ?string $hash The hash prefix of the customer need to retrieve (minimum 8 characters). Cannot be used together with id.
	 * @returns PendingCustomerNeedQueryRequest
	 */
	public function customerNeed(?string $id = null, ?string $hash = null): PendingCustomerNeedQueryRequest
	{
		return new PendingCustomerNeedQueryRequest($this, ['id' => $id, 'hash' => $hash]);
	}

	/**
	 * @param string $request the customer request message to generate an issue title from
	 * @returns PendingIssueTitleSuggestionFromCustomerRequestQueryRequest
	 */
	public function issueTitleSuggestionFromCustomerRequest(string $request): PendingIssueTitleSuggestionFromCustomerRequestQueryRequest
	{
		return new PendingIssueTitleSuggestionFromCustomerRequestQueryRequest($this, ['request' => $request]);
	}

	/**
	 * @param ?CustomerFilterInput $filter filter returned customers
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param ?iterable $sorts Sort criteria for the returned customers. Up to 3 sort fields can be specified.
	 * @returns PendingCustomersQueryRequest
	 */
	public function customers(?CustomerFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?iterable $sorts = null): PendingCustomersQueryRequest
	{
		return new PendingCustomersQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'sorts' => $sorts]);
	}

	/**
	 * @param string $id the identifier or slug of the customer to retrieve
	 * @returns PendingCustomerQueryRequest
	 */
	public function customer(string $id): PendingCustomerQueryRequest
	{
		return new PendingCustomerQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingCustomerStatusesQueryRequest
	 */
	public function customerStatuses(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingCustomerStatusesQueryRequest
	{
		return new PendingCustomerStatusesQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the customer status to retrieve
	 * @returns PendingCustomerStatusQueryRequest
	 */
	public function customerStatus(string $id): PendingCustomerStatusQueryRequest
	{
		return new PendingCustomerStatusQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingCustomerTiersQueryRequest
	 */
	public function customerTiers(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingCustomerTiersQueryRequest
	{
		return new PendingCustomerTiersQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the customer tier to retrieve
	 * @returns PendingCustomerTierQueryRequest
	 */
	public function customerTier(string $id): PendingCustomerTierQueryRequest
	{
		return new PendingCustomerTierQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?CycleFilterInput $filter filter returned cycles
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingCyclesQueryRequest
	 */
	public function cycles(?CycleFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingCyclesQueryRequest
	{
		return new PendingCyclesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the cycle to retrieve
	 * @returns PendingCycleQueryRequest
	 */
	public function cycle(string $id): PendingCycleQueryRequest
	{
		return new PendingCycleQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param iterable $packages
	 * @returns PendingDependencyPackageMetadataQueryRequest
	 */
	public function dependencyPackageMetadata(iterable $packages): PendingDependencyPackageMetadataQueryRequest
	{
		return new PendingDependencyPackageMetadataQueryRequest($this, ['packages' => $packages]);
	}

	/**
	 * @param string $id the identifier of the diff to retrieve
	 * @returns PendingDiffQueryRequest
	 */
	public function diff(string $id): PendingDiffQueryRequest
	{
		return new PendingDiffQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param string $id the identifier of the document content to retrieve history for
	 * @returns PendingDocumentContentHistoryQueryRequest
	 */
	public function documentContentHistory(string $id): PendingDocumentContentHistoryQueryRequest
	{
		return new PendingDocumentContentHistoryQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param string $id the identifier of the document content to retrieve timeline entries for
	 * @returns PendingDocumentContentHistoryTimelineQueryRequest
	 */
	public function documentContentHistoryTimeline(string $id): PendingDocumentContentHistoryTimelineQueryRequest
	{
		return new PendingDocumentContentHistoryTimelineQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param iterable $entryIds The identifiers of the history entries to retrieve. Maximum 10 per request.
	 * @returns PendingDocumentContentHistoryEntriesQueryRequest
	 */
	public function documentContentHistoryEntries(iterable $entryIds): PendingDocumentContentHistoryEntriesQueryRequest
	{
		return new PendingDocumentContentHistoryEntriesQueryRequest($this, ['entryIds' => $entryIds]);
	}

	/**
	 * @param ?DocumentFilterInput $filter filter returned documents
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param ?iterable $sort [INTERNAL] Sort returned documents
	 * @returns PendingDocumentsQueryRequest
	 */
	public function documents(?DocumentFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?iterable $sort = null): PendingDocumentsQueryRequest
	{
		return new PendingDocumentsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'sort' => $sort]);
	}

	/**
	 * @param string $id the identifier or slug of the document to retrieve
	 * @returns PendingDocumentQueryRequest
	 */
	public function document(string $id): PendingDocumentQueryRequest
	{
		return new PendingDocumentQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param string $id
	 * @returns PendingEmailIntakeAddressQueryRequest
	 */
	public function emailIntakeAddress(string $id): PendingEmailIntakeAddressQueryRequest
	{
		return new PendingEmailIntakeAddressQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?EmojiFilterInput $filter filter returned emojis
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param ?iterable $sort [INTERNAL] Sort returned emojis
	 * @returns PendingEmojisQueryRequest
	 */
	public function emojis(?EmojiFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?iterable $sort = null): PendingEmojisQueryRequest
	{
		return new PendingEmojisQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'sort' => $sort]);
	}

	/**
	 * @param string $id the identifier or the name of the emoji to retrieve
	 * @returns PendingEmojiQueryRequest
	 */
	public function emoji(string $id): PendingEmojiQueryRequest
	{
		return new PendingEmojiQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param string $id the identifier of the entity external link to retrieve
	 * @returns PendingEntityExternalLinkQueryRequest
	 */
	public function entityExternalLink(string $id): PendingEntityExternalLinkQueryRequest
	{
		return new PendingEntityExternalLinkQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingExternalUsersQueryRequest
	 */
	public function externalUsers(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingExternalUsersQueryRequest
	{
		return new PendingExternalUsersQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the external user to retrieve
	 * @returns PendingExternalUserQueryRequest
	 */
	public function externalUser(string $id): PendingExternalUserQueryRequest
	{
		return new PendingExternalUserQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingFavoritesQueryRequest
	 */
	public function favorites(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingFavoritesQueryRequest
	{
		return new PendingFavoritesQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id
	 * @returns PendingFavoriteQueryRequest
	 */
	public function favorite(string $id): PendingFavoriteQueryRequest
	{
		return new PendingFavoriteQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?InitiativeFilterInput $filter filter returned initiatives
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param ?iterable $sort [INTERNAL] Sort returned initiatives
	 * @returns PendingInitiativesQueryRequest
	 */
	public function initiatives(?InitiativeFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?iterable $sort = null): PendingInitiativesQueryRequest
	{
		return new PendingInitiativesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'sort' => $sort]);
	}

	/**
	 * @param string $id
	 * @returns PendingInitiativeQueryRequest
	 */
	public function initiative(string $id): PendingInitiativeQueryRequest
	{
		return new PendingInitiativeQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $teamId [Internal] The ID of the team if filtering a team view
	 * @param string $prompt the text prompt to generate a filter suggestion from
	 * @returns PendingInitiativeFilterSuggestionQueryRequest
	 */
	public function initiativeFilterSuggestion(string $prompt, ?string $teamId = null): PendingInitiativeFilterSuggestionQueryRequest
	{
		return new PendingInitiativeFilterSuggestionQueryRequest($this, ['prompt' => $prompt, 'teamId' => $teamId]);
	}

	/**
	 * @param ?string $leadTeamId The identifier of the new lead team. Pass null to clear the lead team.
	 * @param string $id the identifier of the initiative whose lead team would change
	 * @returns PendingInitiativeLeadTeamChangeImpactQueryRequest
	 */
	public function initiativeLeadTeamChangeImpact(string $id, ?string $leadTeamId = null): PendingInitiativeLeadTeamChangeImpactQueryRequest
	{
		return new PendingInitiativeLeadTeamChangeImpactQueryRequest($this, ['id' => $id, 'leadTeamId' => $leadTeamId]);
	}

	/**
	 * @param ?InitiativeLabelFilterInput $filter filter returned initiative labels
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingInitiativeLabelsQueryRequest
	 */
	public function initiativeLabels(?InitiativeLabelFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingInitiativeLabelsQueryRequest
	{
		return new PendingInitiativeLabelsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id
	 * @returns PendingInitiativeLabelQueryRequest
	 */
	public function initiativeLabel(string $id): PendingInitiativeLabelQueryRequest
	{
		return new PendingInitiativeLabelQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingInitiativeRelationsQueryRequest
	 */
	public function initiativeRelations(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingInitiativeRelationsQueryRequest
	{
		return new PendingInitiativeRelationsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id
	 * @returns PendingInitiativeRelationQueryRequest
	 */
	public function initiativeRelation(string $id): PendingInitiativeRelationQueryRequest
	{
		return new PendingInitiativeRelationQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingInitiativeToProjectsQueryRequest
	 */
	public function initiativeToProjects(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingInitiativeToProjectsQueryRequest
	{
		return new PendingInitiativeToProjectsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id
	 * @returns PendingInitiativeToProjectQueryRequest
	 */
	public function initiativeToProject(string $id): PendingInitiativeToProjectQueryRequest
	{
		return new PendingInitiativeToProjectQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?InitiativeUpdateFilterInput $filter filter returned initiative updates
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingInitiativeUpdatesQueryRequest
	 */
	public function initiativeUpdates(?InitiativeUpdateFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingInitiativeUpdatesQueryRequest
	{
		return new PendingInitiativeUpdatesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the initiative update to retrieve
	 * @returns PendingInitiativeUpdateQueryRequest
	 */
	public function initiativeUpdate(string $id): PendingInitiativeUpdateQueryRequest
	{
		return new PendingInitiativeUpdateQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingIntegrationsQueryRequest
	 */
	public function integrations(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingIntegrationsQueryRequest
	{
		return new PendingIntegrationsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the integration to retrieve
	 * @returns PendingIntegrationQueryRequest
	 */
	public function integration(string $id): PendingIntegrationQueryRequest
	{
		return new PendingIntegrationQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @returns PendingArchivedIntegrationsQueryRequest
	 */
	public function archivedIntegrations(): PendingArchivedIntegrationsQueryRequest
	{
		return new PendingArchivedIntegrationsQueryRequest($this, []);
	}

	/**
	 * @param string $integrationId the integration ID
	 * @returns PendingVerifyGitHubEnterpriseServerInstallationQueryRequest
	 */
	public function verifyGitHubEnterpriseServerInstallation(string $integrationId): PendingVerifyGitHubEnterpriseServerInstallationQueryRequest
	{
		return new PendingVerifyGitHubEnterpriseServerInstallationQueryRequest($this, ['integrationId' => $integrationId]);
	}

	/**
	 * @param iterable $scopes required scopes
	 * @param string $integrationId the integration ID
	 * @returns PendingIntegrationHasScopesQueryRequest
	 */
	public function integrationHasScopes(iterable $scopes, string $integrationId): PendingIntegrationHasScopesQueryRequest
	{
		return new PendingIntegrationHasScopesQueryRequest($this, ['scopes' => $scopes, 'integrationId' => $integrationId]);
	}

	/**
	 * @param string $projectId the Jira project ID to fetch statuses for
	 * @param string $integrationId the id of the Jira integration
	 * @returns PendingIntegrationJiraProjectStatusesQueryRequest
	 */
	public function integrationJiraProjectStatuses(string $projectId, string $integrationId): PendingIntegrationJiraProjectStatusesQueryRequest
	{
		return new PendingIntegrationJiraProjectStatusesQueryRequest($this, ['projectId' => $projectId, 'integrationId' => $integrationId]);
	}

	/**
	 * @returns PendingMicrosoftTeamsChannelsQueryRequest
	 */
	public function microsoftTeamsChannels(): PendingMicrosoftTeamsChannelsQueryRequest
	{
		return new PendingMicrosoftTeamsChannelsQueryRequest($this, []);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingIntegrationTemplatesQueryRequest
	 */
	public function integrationTemplates(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingIntegrationTemplatesQueryRequest
	{
		return new PendingIntegrationTemplatesQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the integration template to retrieve
	 * @returns PendingIntegrationTemplateQueryRequest
	 */
	public function integrationTemplate(string $id): PendingIntegrationTemplateQueryRequest
	{
		return new PendingIntegrationTemplateQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param string $id the identifier of the integration settings to retrieve
	 * @returns PendingIntegrationsSettingsQueryRequest
	 */
	public function integrationsSettings(string $id): PendingIntegrationsSettingsQueryRequest
	{
		return new PendingIntegrationsSettingsQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param string $csvUrl the CSV file storage URL
	 * @param string $service the service the CSV contains data from
	 * @returns PendingIssueImportCheckCSVQueryRequest
	 */
	public function issueImportCheckCSV(string $csvUrl, string $service): PendingIssueImportCheckCSVQueryRequest
	{
		return new PendingIssueImportCheckCSVQueryRequest($this, ['csvUrl' => $csvUrl, 'service' => $service]);
	}

	/**
	 * @param string $issueImportId The ID of the issue import for which to check sync eligibility
	 * @returns PendingIssueImportCheckSyncQueryRequest
	 */
	public function issueImportCheckSync(string $issueImportId): PendingIssueImportCheckSyncQueryRequest
	{
		return new PendingIssueImportCheckSyncQueryRequest($this, ['issueImportId' => $issueImportId]);
	}

	/**
	 * @param string $jiraHostname jira installation or cloud hostname
	 * @param string $jiraToken jira personal access token to access Jira REST API
	 * @param string $jiraEmail jira user account email
	 * @param string $jiraProject jira project key to use as the base filter of the query
	 * @param string $jql the JQL query to validate
	 * @returns PendingIssueImportJqlCheckQueryRequest
	 */
	public function issueImportJqlCheck(string $jiraHostname, string $jiraToken, string $jiraEmail, string $jiraProject, string $jql): PendingIssueImportJqlCheckQueryRequest
	{
		return new PendingIssueImportJqlCheckQueryRequest($this, ['jiraHostname' => $jiraHostname, 'jiraToken' => $jiraToken, 'jiraEmail' => $jiraEmail, 'jiraProject' => $jiraProject, 'jql' => $jql]);
	}

	/**
	 * @param ?IssueLabelFilterInput $filter filter returned issue labels
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingIssueLabelsQueryRequest
	 */
	public function issueLabels(?IssueLabelFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingIssueLabelsQueryRequest
	{
		return new PendingIssueLabelsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the label to retrieve
	 * @returns PendingIssueLabelQueryRequest
	 */
	public function issueLabel(string $id): PendingIssueLabelQueryRequest
	{
		return new PendingIssueLabelQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingIssueRelationsQueryRequest
	 */
	public function issueRelations(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingIssueRelationsQueryRequest
	{
		return new PendingIssueRelationsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the issue relation to retrieve
	 * @returns PendingIssueRelationQueryRequest
	 */
	public function issueRelation(string $id): PendingIssueRelationQueryRequest
	{
		return new PendingIssueRelationQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?IssueFilterInput $filter filter returned issues
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param ?iterable $sort [INTERNAL] Sort returned issues
	 * @returns PendingIssuesQueryRequest
	 */
	public function issues(?IssueFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?iterable $sort = null): PendingIssuesQueryRequest
	{
		return new PendingIssuesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'sort' => $sort]);
	}

	/**
	 * @param string $id the identifier of the issue to retrieve
	 * @returns PendingIssueQueryRequest
	 */
	public function issue(string $id): PendingIssueQueryRequest
	{
		return new PendingIssueQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?IssueFilterInput $filter filter returned issues
	 * @param ?string $query [Deprecated] Search string to look for
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingIssueSearchQueryRequest
	 */
	public function issueSearch(?IssueFilterInput $filter = null, ?string $query = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingIssueSearchQueryRequest
	{
		return new PendingIssueSearchQueryRequest($this, ['filter' => $filter, 'query' => $query, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $branchName the VCS branch name to search for
	 * @returns PendingIssueVcsBranchSearchQueryRequest
	 */
	public function issueVcsBranchSearch(string $branchName): PendingIssueVcsBranchSearchQueryRequest
	{
		return new PendingIssueVcsBranchSearchQueryRequest($this, ['branchName' => $branchName]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param string $fileKey the Figma file key
	 * @returns PendingIssueFigmaFileKeySearchQueryRequest
	 */
	public function issueFigmaFileKeySearch(string $fileKey, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingIssueFigmaFileKeySearchQueryRequest
	{
		return new PendingIssueFigmaFileKeySearchQueryRequest($this, ['fileKey' => $fileKey, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @returns PendingIssuePriorityValuesQueryRequest
	 */
	public function issuePriorityValues(): PendingIssuePriorityValuesQueryRequest
	{
		return new PendingIssuePriorityValuesQueryRequest($this, []);
	}

	/**
	 * @param ?string $teamId [Internal] The ID of the team if filtering a team view
	 * @param ?string $projectId the ID of the project if filtering a project view
	 * @param string $prompt the text prompt to generate a filter suggestion from
	 * @returns PendingIssueFilterSuggestionQueryRequest
	 */
	public function issueFilterSuggestion(string $prompt, ?string $teamId = null, ?string $projectId = null): PendingIssueFilterSuggestionQueryRequest
	{
		return new PendingIssueFilterSuggestionQueryRequest($this, ['prompt' => $prompt, 'teamId' => $teamId, 'projectId' => $projectId]);
	}

	/**
	 * @param ?string $agentSessionId optional AgentSession ID associated with the issue for which the suggestions are being generated
	 * @param iterable $candidateRepositories list of candidate repositories to restrict suggestions to
	 * @param string $issueId the ID of the issue to get repository suggestions for
	 * @returns PendingIssueRepositorySuggestionsQueryRequest
	 */
	public function issueRepositorySuggestions(iterable $candidateRepositories, string $issueId, ?string $agentSessionId = null): PendingIssueRepositorySuggestionsQueryRequest
	{
		return new PendingIssueRepositorySuggestionsQueryRequest($this, ['candidateRepositories' => $candidateRepositories, 'issueId' => $issueId, 'agentSessionId' => $agentSessionId]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingIssueToReleasesQueryRequest
	 */
	public function issueToReleases(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingIssueToReleasesQueryRequest
	{
		return new PendingIssueToReleasesQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the issue-to-release association to retrieve
	 * @returns PendingIssueToReleaseQueryRequest
	 */
	public function issueToRelease(string $id): PendingIssueToReleaseQueryRequest
	{
		return new PendingIssueToReleaseQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?NotificationFilterInput $filter filters returned notifications
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingNotificationsQueryRequest
	 */
	public function notifications(?NotificationFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingNotificationsQueryRequest
	{
		return new PendingNotificationsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param ?int $first The maximum number of inbox notification stacks to return. Defaults to 50.
	 * @param ?string $after the cursor after which to return inbox notification stacks
	 * @param ?bool $unreadOnly whether to return only unread inbox notification stacks
	 * @returns PendingInboxNotificationsQueryRequest
	 */
	public function inboxNotifications(?int $first = null, ?string $after = null, ?bool $unreadOnly = null): PendingInboxNotificationsQueryRequest
	{
		return new PendingInboxNotificationsQueryRequest($this, ['first' => $first, 'after' => $after, 'unreadOnly' => $unreadOnly]);
	}

	/**
	 * @returns PendingNotificationsUnreadCountQueryRequest
	 */
	public function notificationsUnreadCount(): PendingNotificationsUnreadCountQueryRequest
	{
		return new PendingNotificationsUnreadCountQueryRequest($this, []);
	}

	/**
	 * @param string $id the identifier of the notification to retrieve
	 * @returns PendingNotificationQueryRequest
	 */
	public function notification(string $id): PendingNotificationQueryRequest
	{
		return new PendingNotificationQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingNotificationSubscriptionsQueryRequest
	 */
	public function notificationSubscriptions(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingNotificationSubscriptionsQueryRequest
	{
		return new PendingNotificationSubscriptionsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the notification subscription to retrieve
	 * @returns PendingNotificationSubscriptionQueryRequest
	 */
	public function notificationSubscription(string $id): PendingNotificationSubscriptionQueryRequest
	{
		return new PendingNotificationSubscriptionQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @returns PendingOauthApplicationsQueryRequest
	 */
	public function oauthApplications(): PendingOauthApplicationsQueryRequest
	{
		return new PendingOauthApplicationsQueryRequest($this, []);
	}

	/**
	 * @param string $id the identifier of the OAuth application to retrieve
	 * @returns PendingOauthApplicationQueryRequest
	 */
	public function oauthApplication(string $id): PendingOauthApplicationQueryRequest
	{
		return new PendingOauthApplicationQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param string $id the ID of the organization domain to claim
	 * @returns PendingOrganizationDomainClaimRequestQueryRequest
	 */
	public function organizationDomainClaimRequest(string $id): PendingOrganizationDomainClaimRequestQueryRequest
	{
		return new PendingOrganizationDomainClaimRequestQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingOrganizationInvitesQueryRequest
	 */
	public function organizationInvites(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingOrganizationInvitesQueryRequest
	{
		return new PendingOrganizationInvitesQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the invite to retrieve
	 * @returns PendingOrganizationInviteQueryRequest
	 */
	public function organizationInvite(string $id): PendingOrganizationInviteQueryRequest
	{
		return new PendingOrganizationInviteQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param string $id the identifier of the invite to retrieve details for
	 * @returns PendingOrganizationInviteDetailsQueryRequest
	 */
	public function organizationInviteDetails(string $id): PendingOrganizationInviteDetailsQueryRequest
	{
		return new PendingOrganizationInviteDetailsQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @returns PendingOrganizationQueryRequest
	 */
	public function organization(): PendingOrganizationQueryRequest
	{
		return new PendingOrganizationQueryRequest($this, []);
	}

	/**
	 * @param string $urlKey the URL key of the workspace to check
	 * @returns PendingOrganizationExistsQueryRequest
	 */
	public function organizationExists(string $urlKey): PendingOrganizationExistsQueryRequest
	{
		return new PendingOrganizationExistsQueryRequest($this, ['urlKey' => $urlKey]);
	}

	/**
	 * @returns PendingArchivedTeamsQueryRequest
	 */
	public function archivedTeams(): PendingArchivedTeamsQueryRequest
	{
		return new PendingArchivedTeamsQueryRequest($this, []);
	}

	/**
	 * @param string $urlKey the URL key of the workspace to retrieve metadata for
	 * @returns PendingOrganizationMetaQueryRequest
	 */
	public function organizationMeta(string $urlKey): PendingOrganizationMetaQueryRequest
	{
		return new PendingOrganizationMetaQueryRequest($this, ['urlKey' => $urlKey]);
	}

	/**
	 * @param string $slug the URL-safe partner slug, for example "y_combinator"
	 * @returns PendingPartnerOfferDetailsQueryRequest
	 */
	public function partnerOfferDetails(string $slug): PendingPartnerOfferDetailsQueryRequest
	{
		return new PendingPartnerOfferDetailsQueryRequest($this, ['slug' => $slug]);
	}

	/**
	 * @returns PendingPartnerProgramPartnersQueryRequest
	 */
	public function partnerProgramPartners(): PendingPartnerProgramPartnersQueryRequest
	{
		return new PendingPartnerProgramPartnersQueryRequest($this, []);
	}

	/**
	 * @param string $token the signed partner-offer token to check eligibility for
	 * @returns PendingPartnerOfferWorkspacesQueryRequest
	 */
	public function partnerOfferWorkspaces(string $token): PendingPartnerOfferWorkspacesQueryRequest
	{
		return new PendingPartnerOfferWorkspacesQueryRequest($this, ['token' => $token]);
	}

	/**
	 * @param ?ProjectLabelFilterInput $filter filter returned project labels
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingProjectLabelsQueryRequest
	 */
	public function projectLabels(?ProjectLabelFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingProjectLabelsQueryRequest
	{
		return new PendingProjectLabelsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id
	 * @returns PendingProjectLabelQueryRequest
	 */
	public function projectLabel(string $id): PendingProjectLabelQueryRequest
	{
		return new PendingProjectLabelQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?ProjectMilestoneFilterInput $filter filter returned project milestones
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingProjectMilestonesQueryRequest
	 */
	public function projectMilestones(?ProjectMilestoneFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingProjectMilestonesQueryRequest
	{
		return new PendingProjectMilestonesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id
	 * @returns PendingProjectMilestoneQueryRequest
	 */
	public function projectMilestone(string $id): PendingProjectMilestoneQueryRequest
	{
		return new PendingProjectMilestoneQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingProjectRelationsQueryRequest
	 */
	public function projectRelations(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingProjectRelationsQueryRequest
	{
		return new PendingProjectRelationsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id
	 * @returns PendingProjectRelationQueryRequest
	 */
	public function projectRelation(string $id): PendingProjectRelationQueryRequest
	{
		return new PendingProjectRelationQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingProjectStatusesQueryRequest
	 */
	public function projectStatuses(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingProjectStatusesQueryRequest
	{
		return new PendingProjectStatusesQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the project status to find the project count for
	 * @returns PendingProjectStatusProjectCountQueryRequest
	 */
	public function projectStatusProjectCount(string $id): PendingProjectStatusProjectCountQueryRequest
	{
		return new PendingProjectStatusProjectCountQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param string $id
	 * @returns PendingProjectStatusQueryRequest
	 */
	public function projectStatus(string $id): PendingProjectStatusQueryRequest
	{
		return new PendingProjectStatusQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?ProjectUpdateFilterInput $filter filter returned project updates
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingProjectUpdatesQueryRequest
	 */
	public function projectUpdates(?ProjectUpdateFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingProjectUpdatesQueryRequest
	{
		return new PendingProjectUpdatesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param ?string $projectId The id or URL slug of the project containing the update. When provided, the update is resolved by id or URL slug within that project.
	 * @param string $id the identifier of the project update to retrieve
	 * @returns PendingProjectUpdateQueryRequest
	 */
	public function projectUpdate(string $id, ?string $projectId = null): PendingProjectUpdateQueryRequest
	{
		return new PendingProjectUpdateQueryRequest($this, ['id' => $id, 'projectId' => $projectId]);
	}

	/**
	 * @param ?bool $targetMobile whether to send to mobile devices
	 * @param ?SendStrategy $sendStrategy the send strategy to use
	 * @returns PendingPushSubscriptionTestQueryRequest
	 */
	public function pushSubscriptionTest(?bool $targetMobile = null, ?SendStrategy $sendStrategy = null): PendingPushSubscriptionTestQueryRequest
	{
		return new PendingPushSubscriptionTestQueryRequest($this, ['targetMobile' => $targetMobile, 'sendStrategy' => $sendStrategy]);
	}

	/**
	 * @returns PendingRateLimitStatusQueryRequest
	 */
	public function rateLimitStatus(): PendingRateLimitStatusQueryRequest
	{
		return new PendingRateLimitStatusQueryRequest($this, []);
	}

	/**
	 * @param ?ReleaseNoteFilterInput $filter filter returned release notes
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingReleaseNotesQueryRequest
	 */
	public function releaseNotes(?ReleaseNoteFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingReleaseNotesQueryRequest
	{
		return new PendingReleaseNotesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id
	 * @returns PendingReleaseNoteQueryRequest
	 */
	public function releaseNote(string $id): PendingReleaseNoteQueryRequest
	{
		return new PendingReleaseNoteQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?ReleasePipelineFilterInput $filter filter returned release pipelines
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param ?iterable $sort sort returned release pipelines
	 * @returns PendingReleasePipelinesQueryRequest
	 */
	public function releasePipelines(?ReleasePipelineFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?iterable $sort = null): PendingReleasePipelinesQueryRequest
	{
		return new PendingReleasePipelinesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'sort' => $sort]);
	}

	/**
	 * @param string $id
	 * @returns PendingReleasePipelineQueryRequest
	 */
	public function releasePipeline(string $id): PendingReleasePipelineQueryRequest
	{
		return new PendingReleasePipelineQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @returns PendingReleasePipelineByAccessKeyQueryRequest
	 */
	public function releasePipelineByAccessKey(): PendingReleasePipelineByAccessKeyQueryRequest
	{
		return new PendingReleasePipelineByAccessKeyQueryRequest($this, []);
	}

	/**
	 * @returns PendingLatestReleaseByAccessKeyQueryRequest
	 */
	public function latestReleaseByAccessKey(): PendingLatestReleaseByAccessKeyQueryRequest
	{
		return new PendingLatestReleaseByAccessKeyQueryRequest($this, []);
	}

	/**
	 * @param ?int $limit Maximum number of releases to return. Defaults to 20 and is capped at 100.
	 * @returns PendingRecentReleasesByAccessKeyQueryRequest
	 */
	public function recentReleasesByAccessKey(?int $limit = null): PendingRecentReleasesByAccessKeyQueryRequest
	{
		return new PendingRecentReleasesByAccessKeyQueryRequest($this, ['limit' => $limit]);
	}

	/**
	 * @param ?ReleaseFilterInput $filter filter returned releases
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param ?iterable $sort sort returned releases
	 * @returns PendingReleasesQueryRequest
	 */
	public function releases(?ReleaseFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?iterable $sort = null): PendingReleasesQueryRequest
	{
		return new PendingReleasesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'sort' => $sort]);
	}

	/**
	 * @param string $id
	 * @returns PendingReleaseQueryRequest
	 */
	public function release(string $id): PendingReleaseQueryRequest
	{
		return new PendingReleaseQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?ReleaseFilterInput $filter filter to apply to the release results
	 * @param ?int $first Maximum results. Capped at 50.
	 * @param ?string $term Search term to match against release name, version, and pipeline name. When omitted, returns releases ordered by stage priority.
	 * @returns PendingReleaseSearchQueryRequest
	 */
	public function releaseSearch(?ReleaseFilterInput $filter = null, ?int $first = null, ?string $term = null): PendingReleaseSearchQueryRequest
	{
		return new PendingReleaseSearchQueryRequest($this, ['filter' => $filter, 'first' => $first, 'term' => $term]);
	}

	/**
	 * @param ?ReleaseStageFilterInput $filter filter returned release stages
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingReleaseStagesQueryRequest
	 */
	public function releaseStages(?ReleaseStageFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingReleaseStagesQueryRequest
	{
		return new PendingReleaseStagesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id
	 * @returns PendingReleaseStageQueryRequest
	 */
	public function releaseStage(string $id): PendingReleaseStageQueryRequest
	{
		return new PendingReleaseStageQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingRoadmapsQueryRequest
	 */
	public function roadmaps(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingRoadmapsQueryRequest
	{
		return new PendingRoadmapsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id
	 * @returns PendingRoadmapQueryRequest
	 */
	public function roadmap(string $id): PendingRoadmapQueryRequest
	{
		return new PendingRoadmapQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingRoadmapToProjectsQueryRequest
	 */
	public function roadmapToProjects(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingRoadmapToProjectsQueryRequest
	{
		return new PendingRoadmapToProjectsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id
	 * @returns PendingRoadmapToProjectQueryRequest
	 */
	public function roadmapToProject(string $id): PendingRoadmapToProjectQueryRequest
	{
		return new PendingRoadmapToProjectQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param string $term search string to look for
	 * @param ?float $snippetSize Size of search snippet to return (default: 100)
	 * @param ?bool $includeComments should associated comments be searched (default: false)
	 * @param ?string $teamId UUID of a team to boost in search results. Results from this team are ranked higher. If null, no team boosting is applied.
	 * @returns PendingSearchDocumentsQueryRequest
	 */
	public function searchDocuments(string $term, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?float $snippetSize = null, ?bool $includeComments = null, ?string $teamId = null): PendingSearchDocumentsQueryRequest
	{
		return new PendingSearchDocumentsQueryRequest($this, ['term' => $term, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'snippetSize' => $snippetSize, 'includeComments' => $includeComments, 'teamId' => $teamId]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param string $term search string to look for
	 * @param ?float $snippetSize Size of search snippet to return (default: 100)
	 * @param ?bool $includeComments should associated comments be searched (default: false)
	 * @param ?string $teamId UUID of a team to boost in search results. Results from this team are ranked higher. If null, no team boosting is applied.
	 * @returns PendingSearchProjectsQueryRequest
	 */
	public function searchProjects(string $term, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?float $snippetSize = null, ?bool $includeComments = null, ?string $teamId = null): PendingSearchProjectsQueryRequest
	{
		return new PendingSearchProjectsQueryRequest($this, ['term' => $term, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'snippetSize' => $snippetSize, 'includeComments' => $includeComments, 'teamId' => $teamId]);
	}

	/**
	 * @param ?IssueFilterInput $filter filter returned issues
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param string $term search string to look for
	 * @param ?float $snippetSize Size of search snippet to return (default: 100)
	 * @param ?bool $includeComments should associated comments be searched (default: false)
	 * @param ?string $teamId UUID of a team to boost in search results. Results from this team are ranked higher. If null, no team boosting is applied.
	 * @returns PendingSearchIssuesQueryRequest
	 */
	public function searchIssues(string $term, ?IssueFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?float $snippetSize = null, ?bool $includeComments = null, ?string $teamId = null): PendingSearchIssuesQueryRequest
	{
		return new PendingSearchIssuesQueryRequest($this, ['term' => $term, 'filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'snippetSize' => $snippetSize, 'includeComments' => $includeComments, 'teamId' => $teamId]);
	}

	/**
	 * @param string $query search query to look for
	 * @param ?iterable $types the types of results to return (default: all)
	 * @param ?int $maxResults the maximum number of results to return (default: 50)
	 * @param ?bool $includeArchived whether to include archived results in the search (default: false)
	 * @param ?SemanticSearchFiltersInput $filters filters to apply to the semantic search results of each type
	 * @returns PendingSemanticSearchQueryRequest
	 */
	public function semanticSearch(string $query, ?iterable $types = null, ?int $maxResults = null, ?bool $includeArchived = null, ?SemanticSearchFiltersInput $filters = null): PendingSemanticSearchQueryRequest
	{
		return new PendingSemanticSearchQueryRequest($this, ['query' => $query, 'types' => $types, 'maxResults' => $maxResults, 'includeArchived' => $includeArchived, 'filters' => $filters]);
	}

	/**
	 * @param string $teamId the identifier or key of the team to evaluate SLA rules against
	 * @returns PendingSlaConfigurationsQueryRequest
	 */
	public function slaConfigurations(string $teamId): PendingSlaConfigurationsQueryRequest
	{
		return new PendingSlaConfigurationsQueryRequest($this, ['teamId' => $teamId]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingTeamMembershipsQueryRequest
	 */
	public function teamMemberships(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingTeamMembershipsQueryRequest
	{
		return new PendingTeamMembershipsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the team membership to retrieve
	 * @returns PendingTeamMembershipQueryRequest
	 */
	public function teamMembership(string $id): PendingTeamMembershipQueryRequest
	{
		return new PendingTeamMembershipQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?TeamFilterInput $filter filter returned teams
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingTeamsQueryRequest
	 */
	public function teams(?TeamFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingTeamsQueryRequest
	{
		return new PendingTeamsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param ?TeamFilterInput $filter filter returned teams
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingAdministrableTeamsQueryRequest
	 */
	public function administrableTeams(?TeamFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingAdministrableTeamsQueryRequest
	{
		return new PendingAdministrableTeamsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the team to retrieve
	 * @returns PendingTeamQueryRequest
	 */
	public function team(string $id): PendingTeamQueryRequest
	{
		return new PendingTeamQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @returns PendingTemplatesQueryRequest
	 */
	public function templates(): PendingTemplatesQueryRequest
	{
		return new PendingTemplatesQueryRequest($this, []);
	}

	/**
	 * @param ?bool $includeArchived should archived resources be included (default: false)
	 * @param ?int $first Maximum results. Capped at 250.
	 * @param ?TemplateFilterInput $filter filter to apply to the template results
	 * @returns PendingTemplateSearchQueryRequest
	 */
	public function templateSearch(?bool $includeArchived = null, ?int $first = null, ?TemplateFilterInput $filter = null): PendingTemplateSearchQueryRequest
	{
		return new PendingTemplateSearchQueryRequest($this, ['includeArchived' => $includeArchived, 'first' => $first, 'filter' => $filter]);
	}

	/**
	 * @param string $id the identifier of the template to retrieve
	 * @returns PendingTemplateQueryRequest
	 */
	public function template(string $id): PendingTemplateQueryRequest
	{
		return new PendingTemplateQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param string $integrationType the type of integration for which to return associated templates
	 * @returns PendingTemplatesForIntegrationQueryRequest
	 */
	public function templatesForIntegration(string $integrationType): PendingTemplatesForIntegrationQueryRequest
	{
		return new PendingTemplatesForIntegrationQueryRequest($this, ['integrationType' => $integrationType]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingTimeSchedulesQueryRequest
	 */
	public function timeSchedules(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingTimeSchedulesQueryRequest
	{
		return new PendingTimeSchedulesQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the time schedule to retrieve
	 * @returns PendingTimeScheduleQueryRequest
	 */
	public function timeSchedule(string $id): PendingTimeScheduleQueryRequest
	{
		return new PendingTimeScheduleQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingTriageResponsibilitiesQueryRequest
	 */
	public function triageResponsibilities(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingTriageResponsibilitiesQueryRequest
	{
		return new PendingTriageResponsibilitiesQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the triage responsibility to retrieve
	 * @returns PendingTriageResponsibilityQueryRequest
	 */
	public function triageResponsibility(string $id): PendingTriageResponsibilityQueryRequest
	{
		return new PendingTriageResponsibilityQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?UsageAlertFilterInput $filter filter returned usage alerts
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingUsageAlertsQueryRequest
	 */
	public function usageAlerts(?UsageAlertFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingUsageAlertsQueryRequest
	{
		return new PendingUsageAlertsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the usage alert to retrieve
	 * @returns PendingUsageAlertQueryRequest
	 */
	public function usageAlert(string $id): PendingUsageAlertQueryRequest
	{
		return new PendingUsageAlertQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?UserFilterInput $filter filter returned users
	 * @param ?bool $includeDisabled should query return disabled/suspended users (default: false)
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param ?iterable $sort [INTERNAL] Sort returned users
	 * @returns PendingUsersQueryRequest
	 */
	public function users(?UserFilterInput $filter = null, ?bool $includeDisabled = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?iterable $sort = null): PendingUsersQueryRequest
	{
		return new PendingUsersQueryRequest($this, ['filter' => $filter, 'includeDisabled' => $includeDisabled, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'sort' => $sort]);
	}

	/**
	 * @param string $id The identifier of the user to retrieve. To retrieve the authenticated user, use `viewer` query.
	 * @returns PendingUserQueryRequest
	 */
	public function user(string $id): PendingUserQueryRequest
	{
		return new PendingUserQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @returns PendingViewerQueryRequest
	 */
	public function viewer(): PendingViewerQueryRequest
	{
		return new PendingViewerQueryRequest($this, []);
	}

	/**
	 * @param string $id the identifier of the user to list sessions of
	 * @returns PendingUserSessionsQueryRequest
	 */
	public function userSessions(string $id): PendingUserSessionsQueryRequest
	{
		return new PendingUserSessionsQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @returns PendingUserSettingsQueryRequest
	 */
	public function userSettings(): PendingUserSettingsQueryRequest
	{
		return new PendingUserSettingsQueryRequest($this, []);
	}

	/**
	 * @param ViewType $viewType the view type the preferences are associated with
	 * @returns PendingUserViewPreferencesQueryRequest
	 */
	public function userViewPreferences(ViewType $viewType): PendingUserViewPreferencesQueryRequest
	{
		return new PendingUserViewPreferencesQueryRequest($this, ['viewType' => $viewType]);
	}

	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingWebhooksQueryRequest
	 */
	public function webhooks(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingWebhooksQueryRequest
	{
		return new PendingWebhooksQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the webhook to retrieve
	 * @returns PendingWebhookQueryRequest
	 */
	public function webhook(string $id): PendingWebhookQueryRequest
	{
		return new PendingWebhookQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param string $webhookId the identifier of the audit log webhook
	 * @returns PendingAuditLogWebhookFailureEventsQueryRequest
	 */
	public function auditLogWebhookFailureEvents(string $webhookId): PendingAuditLogWebhookFailureEventsQueryRequest
	{
		return new PendingAuditLogWebhookFailureEventsQueryRequest($this, ['webhookId' => $webhookId]);
	}

	/**
	 * @param string $oauthClientId the identifier of the OAuth client to retrieve failures for
	 * @returns PendingFailuresForOauthWebhooksQueryRequest
	 */
	public function failuresForOauthWebhooks(string $oauthClientId): PendingFailuresForOauthWebhooksQueryRequest
	{
		return new PendingFailuresForOauthWebhooksQueryRequest($this, ['oauthClientId' => $oauthClientId]);
	}

	/**
	 * @param ?WorkflowStateFilterInput $filter filter returned workflow states
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingWorkflowStatesQueryRequest
	 */
	public function workflowStates(?WorkflowStateFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingWorkflowStatesQueryRequest
	{
		return new PendingWorkflowStatesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the workflow state to retrieve
	 * @returns PendingWorkflowStateQueryRequest
	 */
	public function workflowState(string $id): PendingWorkflowStateQueryRequest
	{
		return new PendingWorkflowStateQueryRequest($this, ['id' => $id]);
	}
}
