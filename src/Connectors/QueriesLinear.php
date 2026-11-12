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
use Glhd\Linearavel\Requests\Inputs\JiraProjectFilterInput;
use Glhd\Linearavel\Requests\Inputs\NotificationFilterInput;
use Glhd\Linearavel\Requests\Inputs\OrganizationQuotaFilterInput;
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
use Glhd\Linearavel\Requests\Pending\Queries\PendingAgentSessionsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAgentSkillQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAgentSkillsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingApplicationInfoQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingArchivedIntegrationsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAttachmentIssueQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAttachmentQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAttachmentsForURLQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAttachmentSourcesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAttachmentsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAuditEntriesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAuditEntryTypesQueryRequest;
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
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomViewHasSubscribersQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomViewQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomViewsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCycleQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCyclesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingDependencyPackageMetadataQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingDocumentContentHistoryQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingDocumentQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingDocumentsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingEmailIntakeAddressesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingEmailIntakeAddressQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingEmojiQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingEmojisQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingEntityExternalLinkQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingExternalUserQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingExternalUsersQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingFavoriteQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingFavoritesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInboxNotificationsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeFilterSuggestionQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeLabelQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeLabelsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeRelationQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeRelationsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeToProjectQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeToProjectsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeUpdateQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeUpdatesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIntegrationHasScopesQueryRequest;
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
use Glhd\Linearavel\Requests\Pending\Queries\PendingJiraProjectQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingJiraProjectsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingLatestReleaseByAccessKeyQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingNotificationQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingNotificationsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingNotificationSubscriptionQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingNotificationSubscriptionsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOauthApplicationCodingSessionTrustedSourceQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOauthApplicationQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOauthApplicationsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOrganizationExistsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOrganizationInviteDetailsQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOrganizationInviteQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOrganizationInvitesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOrganizationQueryRequest;
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
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectStatusQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectUpdateQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectUpdatesQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingPushSubscriptionTestQueryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingQuotasQueryRequest;
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
	 * @param ?AgentActivityFilterInput $filter filter returned agent activities
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingAgentSessionsQueryRequest
	 */
	public function agentSessions(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingAgentSessionsQueryRequest
	{
		return new PendingAgentSessionsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id UUID or URL slug of the agent session
	 * @returns PendingAgentSessionQueryRequest
	 */
	public function agentSession(string $id): PendingAgentSessionQueryRequest
	{
		return new PendingAgentSessionQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?AgentSkillFilterInput $filter filter returned skills
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @returns PendingOauthApplicationCodingSessionTrustedSourceQueryRequest
	 */
	public function oauthApplicationCodingSessionTrustedSource(): PendingOauthApplicationCodingSessionTrustedSourceQueryRequest
	{
		return new PendingOauthApplicationCodingSessionTrustedSourceQueryRequest($this, []);
	}

	/**
	 * @param ?AttachmentFilterInput $filter filter returned attachments
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingAttachmentsQueryRequest
	 */
	public function attachments(?AttachmentFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingAttachmentsQueryRequest
	{
		return new PendingAttachmentsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id The attachment UUID or URL. A URL returns one matching attachment.
	 * @returns PendingAttachmentQueryRequest
	 */
	public function attachment(string $id): PendingAttachmentQueryRequest
	{
		return new PendingAttachmentQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingCommentsQueryRequest
	 */
	public function comments(?CommentFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingCommentsQueryRequest
	{
		return new PendingCommentsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param ?string $id Comment UUID. Supply either id or hash.
	 * @param ?string $issueId [Deprecated] The issue for which to find the comment
	 * @param ?string $hash Comment hash from a Linear comment URL. Supply either hash or id.
	 * @returns PendingCommentQueryRequest
	 */
	public function comment(?string $id = null, ?string $issueId = null, ?string $hash = null): PendingCommentQueryRequest
	{
		return new PendingCommentQueryRequest($this, ['id' => $id, 'issueId' => $issueId, 'hash' => $hash]);
	}

	/**
	 * @param ?ProjectFilterInput $filter filter returned projects
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @param ?iterable $sort sort returned projects
	 * @returns PendingProjectsQueryRequest
	 */
	public function projects(?ProjectFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?iterable $sort = null): PendingProjectsQueryRequest
	{
		return new PendingProjectsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'sort' => $sort]);
	}

	/**
	 * @param string $id the project UUID, slug ID, or human-readable identifier
	 * @returns PendingProjectQueryRequest
	 */
	public function project(string $id): PendingProjectQueryRequest
	{
		return new PendingProjectQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $teamId [Internal] The ID of the team if filtering a team view
	 * @param string $prompt text describing the projects to match
	 * @returns PendingProjectFilterSuggestionQueryRequest
	 */
	public function projectFilterSuggestion(string $prompt, ?string $teamId = null): PendingProjectFilterSuggestionQueryRequest
	{
		return new PendingProjectFilterSuggestionQueryRequest($this, ['prompt' => $prompt, 'teamId' => $teamId]);
	}

	/**
	 * @param ?CustomViewFilterInput $filter filter returned custom views
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @param ?iterable $sort sort returned custom views
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
	 * @param string $id the identifier of the custom view
	 * @returns PendingCustomViewHasSubscribersQueryRequest
	 */
	public function customViewHasSubscribers(string $id): PendingCustomViewHasSubscribersQueryRequest
	{
		return new PendingCustomViewHasSubscribersQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?CustomerNeedFilterInput $filter filter returned customer needs
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingCyclesQueryRequest
	 */
	public function cycles(?CycleFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingCyclesQueryRequest
	{
		return new PendingCyclesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the cycle’s UUID or team-and-number identifier, such as ENG°12
	 * @returns PendingCycleQueryRequest
	 */
	public function cycle(string $id): PendingCycleQueryRequest
	{
		return new PendingCycleQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param iterable $packages Packages to look up, in response order. Maximum 500.
	 * @returns PendingDependencyPackageMetadataQueryRequest
	 */
	public function dependencyPackageMetadata(iterable $packages): PendingDependencyPackageMetadataQueryRequest
	{
		return new PendingDependencyPackageMetadataQueryRequest($this, ['packages' => $packages]);
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
	 * @param ?DocumentFilterInput $filter filter returned documents
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @param ?iterable $sort sort returned documents
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
	 * @param string $id the UUID of the intake address
	 * @returns PendingEmailIntakeAddressQueryRequest
	 */
	public function emailIntakeAddress(string $id): PendingEmailIntakeAddressQueryRequest
	{
		return new PendingEmailIntakeAddressQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingEmailIntakeAddressesQueryRequest
	 */
	public function emailIntakeAddresses(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingEmailIntakeAddressesQueryRequest
	{
		return new PendingEmailIntakeAddressesQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param ?EmojiFilterInput $filter filter returned emojis
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @param ?iterable $sort sort returned emojis
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingFavoritesQueryRequest
	 */
	public function favorites(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingFavoritesQueryRequest
	{
		return new PendingFavoritesQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the UUID of the favorite
	 * @returns PendingFavoriteQueryRequest
	 */
	public function favorite(string $id): PendingFavoriteQueryRequest
	{
		return new PendingFavoriteQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?InitiativeFilterInput $filter filter returned initiatives
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @param ?iterable $sort sort returned initiatives
	 * @returns PendingInitiativesQueryRequest
	 */
	public function initiatives(?InitiativeFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?iterable $sort = null): PendingInitiativesQueryRequest
	{
		return new PendingInitiativesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'sort' => $sort]);
	}

	/**
	 * @param string $id the initiative UUID, slug ID, or human-readable identifier
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
	 * @param ?InitiativeLabelFilterInput $filter filter returned initiative labels
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingInitiativeLabelsQueryRequest
	 */
	public function initiativeLabels(?InitiativeLabelFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingInitiativeLabelsQueryRequest
	{
		return new PendingInitiativeLabelsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the UUID of the initiative label
	 * @returns PendingInitiativeLabelQueryRequest
	 */
	public function initiativeLabel(string $id): PendingInitiativeLabelQueryRequest
	{
		return new PendingInitiativeLabelQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingInitiativeRelationsQueryRequest
	 */
	public function initiativeRelations(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingInitiativeRelationsQueryRequest
	{
		return new PendingInitiativeRelationsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the UUID of the initiative relation
	 * @returns PendingInitiativeRelationQueryRequest
	 */
	public function initiativeRelation(string $id): PendingInitiativeRelationQueryRequest
	{
		return new PendingInitiativeRelationQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingInitiativeToProjectsQueryRequest
	 */
	public function initiativeToProjects(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingInitiativeToProjectsQueryRequest
	{
		return new PendingInitiativeToProjectsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the UUID of the initiative-to-project link
	 * @returns PendingInitiativeToProjectQueryRequest
	 */
	public function initiativeToProject(string $id): PendingInitiativeToProjectQueryRequest
	{
		return new PendingInitiativeToProjectQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?InitiativeUpdateFilterInput $filter filter returned initiative updates
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param string $csvUrl asset URL of a CSV uploaded to this workspace’s import storage
	 * @param string $service CSV source service. Only jira is supported.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @param ?iterable $sort sort returned issues
	 * @returns PendingIssuesQueryRequest
	 */
	public function issues(?IssueFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?iterable $sort = null): PendingIssuesQueryRequest
	{
		return new PendingIssuesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'sort' => $sort]);
	}

	/**
	 * @param string $id issue UUID or identifier, such as ENG-123
	 * @returns PendingIssueQueryRequest
	 */
	public function issue(string $id): PendingIssueQueryRequest
	{
		return new PendingIssueQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?IssueFilterInput $filter filter returned issues
	 * @param ?string $query [Deprecated] Search string to look for
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?JiraProjectFilterInput $filter filter returned Jira projects
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingJiraProjectsQueryRequest
	 */
	public function jiraProjects(?JiraProjectFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingJiraProjectsQueryRequest
	{
		return new PendingJiraProjectsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the identifier of the Jira project to retrieve
	 * @returns PendingJiraProjectQueryRequest
	 */
	public function jiraProject(string $id): PendingJiraProjectQueryRequest
	{
		return new PendingJiraProjectQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?NotificationFilterInput $filter filters returned notifications
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param string $id the identifier of the notification to retrieve
	 * @returns PendingNotificationQueryRequest
	 */
	public function notification(string $id): PendingNotificationQueryRequest
	{
		return new PendingNotificationQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?OrganizationQuotaFilterInput $filter limits the returned quotas by key or scope
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @returns PendingQuotasQueryRequest
	 */
	public function quotas(?OrganizationQuotaFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null): PendingQuotasQueryRequest
	{
		return new PendingQuotasQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last]);
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
	 * @param ?ProjectLabelFilterInput $filter filter returned project labels
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingProjectLabelsQueryRequest
	 */
	public function projectLabels(?ProjectLabelFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingProjectLabelsQueryRequest
	{
		return new PendingProjectLabelsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the UUID of the project label
	 * @returns PendingProjectLabelQueryRequest
	 */
	public function projectLabel(string $id): PendingProjectLabelQueryRequest
	{
		return new PendingProjectLabelQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?ProjectMilestoneFilterInput $filter filter returned project milestones
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingProjectMilestonesQueryRequest
	 */
	public function projectMilestones(?ProjectMilestoneFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingProjectMilestonesQueryRequest
	{
		return new PendingProjectMilestonesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the UUID of the milestone
	 * @returns PendingProjectMilestoneQueryRequest
	 */
	public function projectMilestone(string $id): PendingProjectMilestoneQueryRequest
	{
		return new PendingProjectMilestoneQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingProjectRelationsQueryRequest
	 */
	public function projectRelations(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingProjectRelationsQueryRequest
	{
		return new PendingProjectRelationsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the UUID of the project relation
	 * @returns PendingProjectRelationQueryRequest
	 */
	public function projectRelation(string $id): PendingProjectRelationQueryRequest
	{
		return new PendingProjectRelationQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingProjectStatusesQueryRequest
	 */
	public function projectStatuses(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingProjectStatusesQueryRequest
	{
		return new PendingProjectStatusesQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the UUID of the project status
	 * @returns PendingProjectStatusQueryRequest
	 */
	public function projectStatus(string $id): PendingProjectStatusQueryRequest
	{
		return new PendingProjectStatusQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?ProjectUpdateFilterInput $filter filter returned project updates
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?bool $targetMobile Whether to target mobile devices. Defaults to false, which targets desktop notifications.
	 * @param ?SendStrategy $sendStrategy Use push for push subscribers, desktop for connected desktop clients, desktopAndPush for both, or desktopThenPush to prefer connected desktop clients. Defaults to push.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingReleaseNotesQueryRequest
	 */
	public function releaseNotes(?ReleaseNoteFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingReleaseNotesQueryRequest
	{
		return new PendingReleaseNotesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the release note UUID or slug ID
	 * @returns PendingReleaseNoteQueryRequest
	 */
	public function releaseNote(string $id): PendingReleaseNoteQueryRequest
	{
		return new PendingReleaseNoteQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?ReleasePipelineFilterInput $filter filter returned release pipelines
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @param ?iterable $sort sort returned release pipelines
	 * @returns PendingReleasePipelinesQueryRequest
	 */
	public function releasePipelines(?ReleasePipelineFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?iterable $sort = null): PendingReleasePipelinesQueryRequest
	{
		return new PendingReleasePipelinesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'sort' => $sort]);
	}

	/**
	 * @param string $id the release pipeline UUID or slug ID
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @param ?iterable $sort sort returned releases
	 * @returns PendingReleasesQueryRequest
	 */
	public function releases(?ReleaseFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?iterable $sort = null): PendingReleasesQueryRequest
	{
		return new PendingReleasesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'sort' => $sort]);
	}

	/**
	 * @param string $id the release UUID or slug ID
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingReleaseStagesQueryRequest
	 */
	public function releaseStages(?ReleaseStageFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingReleaseStagesQueryRequest
	{
		return new PendingReleaseStagesQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the UUID of the release stage
	 * @returns PendingReleaseStageQueryRequest
	 */
	public function releaseStage(string $id): PendingReleaseStageQueryRequest
	{
		return new PendingReleaseStageQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingRoadmapsQueryRequest
	 */
	public function roadmaps(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingRoadmapsQueryRequest
	{
		return new PendingRoadmapsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id the roadmap UUID or slug ID
	 * @returns PendingRoadmapQueryRequest
	 */
	public function roadmap(string $id): PendingRoadmapQueryRequest
	{
		return new PendingRoadmapQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingRoadmapToProjectsQueryRequest
	 */
	public function roadmapToProjects(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingRoadmapToProjectsQueryRequest
	{
		return new PendingRoadmapToProjectsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param string $id The UUID of the legacy roadmap-to-project link. This query is no longer supported.
	 * @returns PendingRoadmapToProjectQueryRequest
	 */
	public function roadmapToProject(string $id): PendingRoadmapToProjectQueryRequest
	{
		return new PendingRoadmapToProjectQueryRequest($this, ['id' => $id]);
	}

	/**
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @param string $term The text to search for, from 1 to 1024 characters. You can use keywords or a natural-language description; search combines text matching with relevance by meaning.
	 * @param ?float $snippetSize Ignored. Search snippets are no longer returned.
	 * @param ?bool $includeComments Include comment text when searching issues. Defaults to false; ignored for project and document searches.
	 * @param ?string $teamId UUID of a team to restrict results to. Omit or pass null to search all accessible teams.
	 * @returns PendingSearchDocumentsQueryRequest
	 */
	public function searchDocuments(string $term, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?float $snippetSize = null, ?bool $includeComments = null, ?string $teamId = null): PendingSearchDocumentsQueryRequest
	{
		return new PendingSearchDocumentsQueryRequest($this, ['term' => $term, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'snippetSize' => $snippetSize, 'includeComments' => $includeComments, 'teamId' => $teamId]);
	}

	/**
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @param string $term The text to search for, from 1 to 1024 characters. You can use keywords or a natural-language description; search combines text matching with relevance by meaning.
	 * @param ?float $snippetSize Ignored. Search snippets are no longer returned.
	 * @param ?bool $includeComments Include comment text when searching issues. Defaults to false; ignored for project and document searches.
	 * @param ?string $teamId UUID of a team to restrict results to. Omit or pass null to search all accessible teams.
	 * @returns PendingSearchProjectsQueryRequest
	 */
	public function searchProjects(string $term, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?float $snippetSize = null, ?bool $includeComments = null, ?string $teamId = null): PendingSearchProjectsQueryRequest
	{
		return new PendingSearchProjectsQueryRequest($this, ['term' => $term, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'snippetSize' => $snippetSize, 'includeComments' => $includeComments, 'teamId' => $teamId]);
	}

	/**
	 * @param ?IssueFilterInput $filter filter returned issues
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @param string $term The text to search for, from 1 to 1024 characters. You can use keywords or a natural-language description; search combines text matching with relevance by meaning.
	 * @param ?float $snippetSize Ignored. Search snippets are no longer returned.
	 * @param ?bool $includeComments Include comment text when searching issues. Defaults to false; ignored for project and document searches.
	 * @param ?string $teamId UUID of a team to restrict results to. Omit or pass null to search all accessible teams.
	 * @returns PendingSearchIssuesQueryRequest
	 */
	public function searchIssues(string $term, ?IssueFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?float $snippetSize = null, ?bool $includeComments = null, ?string $teamId = null): PendingSearchIssuesQueryRequest
	{
		return new PendingSearchIssuesQueryRequest($this, ['term' => $term, 'filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy, 'snippetSize' => $snippetSize, 'includeComments' => $includeComments, 'teamId' => $teamId]);
	}

	/**
	 * @param string $query A search phrase or natural-language description of what you are looking for, from 1 to 1024 characters. Results combine text matching with relevance by meaning.
	 * @param ?iterable $types the types of results to return (default: all)
	 * @param ?int $maxResults The requested number of ranked search results, from 1 to 50; defaults to 50. Exact matches and original issues for matching duplicates can add results beyond this number.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @returns PendingTeamsQueryRequest
	 */
	public function teams(?TeamFilterInput $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingTeamsQueryRequest
	{
		return new PendingTeamsQueryRequest($this, ['filter' => $filter, 'before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}

	/**
	 * @param ?TeamFilterInput $filter filter returned teams
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?bool $includeDisabled Include disabled and suspended accounts. Defaults to false.
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
	 * @param ?iterable $sort sort returned users
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
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
	 * @param ?WorkflowStateFilterInput $filter filter returned workflow states
	 * @param ?string $before Returns results before this cursor. Pair with `last` to paginate backward, using a cursor returned by the same connection. Keep the filters and ordering unchanged between pages. Cannot be combined with `first` or `after`.
	 * @param ?string $after Returns results after this cursor. Pair with `first` and the previous page's `endCursor` to fetch the next page. Keep the filters and ordering unchanged between pages. Cannot be combined with `last` or `before`.
	 * @param ?int $first The maximum number of results to return, starting after `after` if supplied. Between 1 and 250. Defaults to 50 when neither `first` nor `last` is supplied. Cannot be combined with `last` or `before`.
	 * @param ?int $last The maximum number of results to return, ending before `before` if supplied. Between 1 and 250. Cannot be combined with `first` or `after`.
	 * @param ?bool $includeArchived Includes archived resources alongside active ones. Defaults to false, which returns only active resources. This does not include deleted resources.
	 * @param ?PaginationOrderBy $orderBy Orders results by creation time or last meaningful update time. Defaults to `createdAt`. Results are newest first with `first` and oldest first with `last`; use the returned `endCursor` as `before` to continue backward. Cannot be combined with custom `sort` options on fields that support them.
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
