<?php

namespace Glhd\Linearavel\Connectors;

use Glhd\Linearavel\Data\Enums\PaginationOrderBy;
use Glhd\Linearavel\Data\Enums\SendStrategy;
use Glhd\Linearavel\Requests\Inputs\AttachmentFilterInput;
use Glhd\Linearavel\Requests\Inputs\AuditEntryFilterInput;
use Glhd\Linearavel\Requests\Inputs\CommentFilterInput;
use Glhd\Linearavel\Requests\Inputs\CycleFilterInput;
use Glhd\Linearavel\Requests\Inputs\DocumentFilterInput;
use Glhd\Linearavel\Requests\Inputs\IssueFilterInput;
use Glhd\Linearavel\Requests\Inputs\IssueLabelFilterInput;
use Glhd\Linearavel\Requests\Inputs\ProjectFilterInput;
use Glhd\Linearavel\Requests\Inputs\ProjectMilestoneFilterInput;
use Glhd\Linearavel\Requests\Inputs\ProjectUpdateFilterInput;
use Glhd\Linearavel\Requests\Inputs\TeamFilterInput;
use Glhd\Linearavel\Requests\Inputs\UserFilterInput;
use Glhd\Linearavel\Requests\Inputs\WorkflowStateFilterInput;
use Glhd\Linearavel\Requests\Pending\PendingAdministrableTeamsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingApiKeysQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingApplicationInfoByIdsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingApplicationInfoQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingApplicationInfoWithMembershipsByIdsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingApplicationWithAuthorizationQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingArchivedTeamsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingAttachmentIssueQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingAttachmentQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingAttachmentsForURLQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingAttachmentSourcesQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingAttachmentsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingAuditEntriesQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingAuditEntryTypesQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingAuthenticationSessionsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingAuthorizedApplicationsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingAvailableUsersQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingCommentQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingCommentsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingCustomViewDetailsSuggestionQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingCustomViewHasSubscribersQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingCustomViewQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingCustomViewsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingCycleQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingCyclesQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingDocumentContentHistoryQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingDocumentQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingDocumentsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingEmojiQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingEmojisQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingExternalUserQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingExternalUsersQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingFavoriteQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingFavoritesQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingInitiativeQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingInitiativesQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingInitiativeToProjectQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingInitiativeToProjectsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIntegrationHasScopesQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIntegrationQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIntegrationsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIntegrationsSettingsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIntegrationTemplateQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIntegrationTemplatesQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIssueFigmaFileKeySearchQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIssueFilterSuggestionQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIssueImportCheckCSVQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIssueImportFinishGithubOAuthQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIssueLabelQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIssueLabelsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIssuePriorityValuesQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIssueQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIssueRelationQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIssueRelationsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIssueSearchQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIssuesQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingIssueVcsBranchSearchQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingNotificationQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingNotificationsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingNotificationSubscriptionQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingNotificationSubscriptionsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingOrganizationDomainClaimRequestQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingOrganizationExistsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingOrganizationInviteDetailsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingOrganizationInviteQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingOrganizationInvitesQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingOrganizationQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingProjectFilterSuggestionQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingProjectLinkQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingProjectLinksQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingProjectMilestoneQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingProjectMilestonesQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingProjectQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingProjectsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingProjectUpdateInteractionQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingProjectUpdateInteractionsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingProjectUpdateQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingProjectUpdatesQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingPushSubscriptionTestQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingRateLimitStatusQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingRoadmapQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingRoadmapsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingRoadmapToProjectQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingRoadmapToProjectsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingSearchDocumentsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingSearchIssuesQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingSearchProjectsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingSsoUrlFromEmailQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingTeamMembershipQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingTeamMembershipsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingTeamQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingTeamsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingTemplateQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingTemplatesForIntegrationQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingTemplatesQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingTimeScheduleQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingTimeSchedulesQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingTriageResponsibilitiesQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingTriageResponsibilityQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingUserQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingUserSettingsQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingUsersQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingViewerQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingWebhookQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingWebhooksQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingWorkflowStateQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingWorkflowStatesQueryRequest;
use Glhd\Linearavel\Requests\Pending\PendingWorkspaceAuthorizedApplicationsQueryRequest;

trait QueriesLinear
{
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingApiKeysQueryRequest
	 */
	public function apiKeys(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingApiKeysQueryRequest {
		return new PendingApiKeysQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
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
	 * @param iterable $ids the IDs of the applications
	 * @returns PendingApplicationInfoByIdsQueryRequest
	 */
	public function applicationInfoByIds(iterable $ids): PendingApplicationInfoByIdsQueryRequest
	{
		return new PendingApplicationInfoByIdsQueryRequest($this, ['ids' => $ids]);
	}
	
	/**
	 * @param iterable $clientIds the client IDs to look up
	 * @returns PendingApplicationInfoWithMembershipsByIdsQueryRequest
	 */
	public function applicationInfoWithMembershipsByIds(iterable $clientIds): PendingApplicationInfoWithMembershipsByIdsQueryRequest
	{
		return new PendingApplicationInfoWithMembershipsByIdsQueryRequest($this, ['clientIds' => $clientIds]);
	}
	
	/**
	 * @param ?string $actor actor mode used for the authorization
	 * @param ?string $redirectUri redirect URI for the application
	 * @param iterable $scope scopes being requested by the application
	 * @param string $clientId the client ID of the application
	 * @returns PendingApplicationWithAuthorizationQueryRequest
	 */
	public function applicationWithAuthorization(iterable $scope, string $clientId, ?string $actor = null, ?string $redirectUri = null): PendingApplicationWithAuthorizationQueryRequest
	{
		return new PendingApplicationWithAuthorizationQueryRequest($this, ['scope' => $scope, 'clientId' => $clientId, 'actor' => $actor, 'redirectUri' => $redirectUri]);
	}
	
	/**
	 * @returns PendingAuthorizedApplicationsQueryRequest
	 */
	public function authorizedApplications(): PendingAuthorizedApplicationsQueryRequest
	{
		return new PendingAuthorizedApplicationsQueryRequest($this, []);
	}
	
	/**
	 * @returns PendingWorkspaceAuthorizedApplicationsQueryRequest
	 */
	public function workspaceAuthorizedApplications(): PendingWorkspaceAuthorizedApplicationsQueryRequest
	{
		return new PendingWorkspaceAuthorizedApplicationsQueryRequest($this, []);
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
	public function attachments(
		?AttachmentFilterInput $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingAttachmentsQueryRequest {
		return new PendingAttachmentsQueryRequest($this, [
			'filter' => $filter,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
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
	public function attachmentsForURL(
		string $url,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingAttachmentsForURLQueryRequest {
		return new PendingAttachmentsForURLQueryRequest($this, [
			'url' => $url,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
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
	public function auditEntries(
		?AuditEntryFilterInput $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingAuditEntriesQueryRequest {
		return new PendingAuditEntriesQueryRequest($this, [
			'filter' => $filter,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
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
	 * @param string $email email to query the SSO login URL by
	 * @returns PendingSsoUrlFromEmailQueryRequest
	 */
	public function ssoUrlFromEmail(string $email, ?bool $isDesktop = null): PendingSsoUrlFromEmailQueryRequest
	{
		return new PendingSsoUrlFromEmailQueryRequest($this, ['email' => $email, 'isDesktop' => $isDesktop]);
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
	public function comments(
		?CommentFilterInput $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingCommentsQueryRequest {
		return new PendingCommentsQueryRequest($this, [
			'filter' => $filter,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
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
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingCustomViewsQueryRequest
	 */
	public function customViews(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingCustomViewsQueryRequest {
		return new PendingCustomViewsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingCustomViewQueryRequest
	 */
	public function customView(string $id): PendingCustomViewQueryRequest
	{
		return new PendingCustomViewQueryRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?string $modelName
	 * @param string $filter
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
	 * @param ?CycleFilterInput $filter filter returned users
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingCyclesQueryRequest
	 */
	public function cycles(
		?CycleFilterInput $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingCyclesQueryRequest {
		return new PendingCyclesQueryRequest($this, [
			'filter' => $filter,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingCycleQueryRequest
	 */
	public function cycle(string $id): PendingCycleQueryRequest
	{
		return new PendingCycleQueryRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingDocumentContentHistoryQueryRequest
	 */
	public function documentContentHistory(string $id): PendingDocumentContentHistoryQueryRequest
	{
		return new PendingDocumentContentHistoryQueryRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?DocumentFilterInput $filter filter returned documents
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingDocumentsQueryRequest
	 */
	public function documents(
		?DocumentFilterInput $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingDocumentsQueryRequest {
		return new PendingDocumentsQueryRequest($this, [
			'filter' => $filter,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingDocumentQueryRequest
	 */
	public function document(string $id): PendingDocumentQueryRequest
	{
		return new PendingDocumentQueryRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingEmojisQueryRequest
	 */
	public function emojis(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingEmojisQueryRequest {
		return new PendingEmojisQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
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
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingExternalUsersQueryRequest
	 */
	public function externalUsers(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingExternalUsersQueryRequest {
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
	 * @returns PendingInitiativeToProjectsQueryRequest
	 */
	public function initiativeToProjects(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingInitiativeToProjectsQueryRequest {
		return new PendingInitiativeToProjectsQueryRequest($this, [
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
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
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingInitiativesQueryRequest
	 */
	public function initiatives(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingInitiativesQueryRequest {
		return new PendingInitiativesQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
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
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingFavoritesQueryRequest
	 */
	public function favorites(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingFavoritesQueryRequest {
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
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingIntegrationsQueryRequest
	 */
	public function integrations(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingIntegrationsQueryRequest {
		return new PendingIntegrationsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingIntegrationQueryRequest
	 */
	public function integration(string $id): PendingIntegrationQueryRequest
	{
		return new PendingIntegrationQueryRequest($this, ['id' => $id]);
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
	 * @param ?ProjectUpdateFilterInput $filter filter returned project updates
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingProjectUpdatesQueryRequest
	 */
	public function projectUpdates(
		?ProjectUpdateFilterInput $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingProjectUpdatesQueryRequest {
		return new PendingProjectUpdatesQueryRequest($this, [
			'filter' => $filter,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingIntegrationsSettingsQueryRequest
	 */
	public function integrationsSettings(string $id): PendingIntegrationsSettingsQueryRequest
	{
		return new PendingIntegrationsSettingsQueryRequest($this, ['id' => $id]);
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
	public function integrationTemplates(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingIntegrationTemplatesQueryRequest {
		return new PendingIntegrationTemplatesQueryRequest($this, [
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingIntegrationTemplateQueryRequest
	 */
	public function integrationTemplate(string $id): PendingIntegrationTemplateQueryRequest
	{
		return new PendingIntegrationTemplateQueryRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param string $code OAuth code
	 * @returns PendingIssueImportFinishGithubOAuthQueryRequest
	 */
	public function issueImportFinishGithubOAuth(string $code): PendingIssueImportFinishGithubOAuthQueryRequest
	{
		return new PendingIssueImportFinishGithubOAuthQueryRequest($this, ['code' => $code]);
	}
	
	/**
	 * @param string $csvUrl CSV storage url
	 * @param string $service the service the CSV containing data from
	 * @returns PendingIssueImportCheckCSVQueryRequest
	 */
	public function issueImportCheckCSV(string $csvUrl, string $service): PendingIssueImportCheckCSVQueryRequest
	{
		return new PendingIssueImportCheckCSVQueryRequest($this, ['csvUrl' => $csvUrl, 'service' => $service]);
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
	public function issueLabels(
		?IssueLabelFilterInput $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingIssueLabelsQueryRequest {
		return new PendingIssueLabelsQueryRequest($this, [
			'filter' => $filter,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
	}
	
	/**
	 * @param string $id
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
	public function issueRelations(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingIssueRelationsQueryRequest {
		return new PendingIssueRelationsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id
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
	public function issues(
		?IssueFilterInput $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null,
		?iterable $sort = null
	): PendingIssuesQueryRequest {
		return new PendingIssuesQueryRequest($this, [
			'filter' => $filter,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
			'sort' => $sort,
		]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingIssueQueryRequest
	 */
	public function issue(string $id): PendingIssueQueryRequest
	{
		return new PendingIssueQueryRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?IssueFilterInput $filter filter returned issues
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param ?string $query [Deprecated] Search string to look for
	 * @returns PendingIssueSearchQueryRequest
	 */
	public function issueSearch(
		?IssueFilterInput $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null,
		?string $query = null
	): PendingIssueSearchQueryRequest {
		return new PendingIssueSearchQueryRequest($this, [
			'filter' => $filter,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
			'query' => $query,
		]);
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
	public function issueFigmaFileKeySearch(
		string $fileKey,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingIssueFigmaFileKeySearchQueryRequest {
		return new PendingIssueFigmaFileKeySearchQueryRequest($this, [
			'fileKey' => $fileKey,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
	}
	
	/**
	 * @returns PendingIssuePriorityValuesQueryRequest
	 */
	public function issuePriorityValues(): PendingIssuePriorityValuesQueryRequest
	{
		return new PendingIssuePriorityValuesQueryRequest($this, []);
	}
	
	/**
	 * @param ?string $projectId The ID of the project if filtering a project view
	 * @param string $prompt
	 * @returns PendingIssueFilterSuggestionQueryRequest
	 */
	public function issueFilterSuggestion(string $prompt, ?string $projectId = null): PendingIssueFilterSuggestionQueryRequest
	{
		return new PendingIssueFilterSuggestionQueryRequest($this, ['prompt' => $prompt, 'projectId' => $projectId]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingNotificationsQueryRequest
	 */
	public function notifications(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingNotificationsQueryRequest {
		return new PendingNotificationsQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id
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
	public function notificationSubscriptions(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingNotificationSubscriptionsQueryRequest {
		return new PendingNotificationSubscriptionsQueryRequest($this, [
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingNotificationSubscriptionQueryRequest
	 */
	public function notificationSubscription(string $id): PendingNotificationSubscriptionQueryRequest
	{
		return new PendingNotificationSubscriptionQueryRequest($this, ['id' => $id]);
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
	public function organizationInvites(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingOrganizationInvitesQueryRequest {
		return new PendingOrganizationInvitesQueryRequest($this, [
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingOrganizationInviteQueryRequest
	 */
	public function organizationInvite(string $id): PendingOrganizationInviteQueryRequest
	{
		return new PendingOrganizationInviteQueryRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param string $id
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
	 * @param string $urlKey
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
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingProjectLinksQueryRequest
	 */
	public function projectLinks(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingProjectLinksQueryRequest {
		return new PendingProjectLinksQueryRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingProjectLinkQueryRequest
	 */
	public function projectLink(string $id): PendingProjectLinkQueryRequest
	{
		return new PendingProjectLinkQueryRequest($this, ['id' => $id]);
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
	public function projectMilestones(
		?ProjectMilestoneFilterInput $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingProjectMilestonesQueryRequest {
		return new PendingProjectMilestonesQueryRequest($this, [
			'filter' => $filter,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
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
	 * @param ?ProjectFilterInput $filter filter returned projects
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingProjectsQueryRequest
	 */
	public function projects(
		?ProjectFilterInput $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingProjectsQueryRequest {
		return new PendingProjectsQueryRequest($this, [
			'filter' => $filter,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
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
	 * @param string $prompt
	 * @returns PendingProjectFilterSuggestionQueryRequest
	 */
	public function projectFilterSuggestion(string $prompt): PendingProjectFilterSuggestionQueryRequest
	{
		return new PendingProjectFilterSuggestionQueryRequest($this, ['prompt' => $prompt]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingProjectUpdateInteractionsQueryRequest
	 */
	public function projectUpdateInteractions(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingProjectUpdateInteractionsQueryRequest {
		return new PendingProjectUpdateInteractionsQueryRequest($this, [
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
	}
	
	/**
	 * @param string $id the identifier of the project update interaction to retrieve
	 * @returns PendingProjectUpdateInteractionQueryRequest
	 */
	public function projectUpdateInteraction(string $id): PendingProjectUpdateInteractionQueryRequest
	{
		return new PendingProjectUpdateInteractionQueryRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param string $id the identifier of the project update to retrieve
	 * @returns PendingProjectUpdateQueryRequest
	 */
	public function projectUpdate(string $id): PendingProjectUpdateQueryRequest
	{
		return new PendingProjectUpdateQueryRequest($this, ['id' => $id]);
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
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingRoadmapsQueryRequest
	 */
	public function roadmaps(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingRoadmapsQueryRequest {
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
	public function roadmapToProjects(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingRoadmapToProjectsQueryRequest {
		return new PendingRoadmapToProjectsQueryRequest($this, [
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
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
	 * @param ?bool $includeComments should associated comments be searched (default: true)
	 * @param ?string $teamId UUID of a team to use as a boost
	 * @returns PendingSearchDocumentsQueryRequest
	 */
	public function searchDocuments(
		string $term,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null,
		?float $snippetSize = null,
		?bool $includeComments = null,
		?string $teamId = null
	): PendingSearchDocumentsQueryRequest {
		return new PendingSearchDocumentsQueryRequest($this, [
			'term' => $term,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
			'snippetSize' => $snippetSize,
			'includeComments' => $includeComments,
			'teamId' => $teamId,
		]);
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
	 * @param ?bool $includeComments should associated comments be searched (default: true)
	 * @param ?string $teamId UUID of a team to use as a boost
	 * @returns PendingSearchProjectsQueryRequest
	 */
	public function searchProjects(
		string $term,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null,
		?float $snippetSize = null,
		?bool $includeComments = null,
		?string $teamId = null
	): PendingSearchProjectsQueryRequest {
		return new PendingSearchProjectsQueryRequest($this, [
			'term' => $term,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
			'snippetSize' => $snippetSize,
			'includeComments' => $includeComments,
			'teamId' => $teamId,
		]);
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
	 * @param ?bool $includeComments should associated comments be searched (default: true)
	 * @param ?string $teamId UUID of a team to use as a boost
	 * @returns PendingSearchIssuesQueryRequest
	 */
	public function searchIssues(
		string $term,
		?IssueFilterInput $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null,
		?float $snippetSize = null,
		?bool $includeComments = null,
		?string $teamId = null
	): PendingSearchIssuesQueryRequest {
		return new PendingSearchIssuesQueryRequest($this, [
			'term' => $term,
			'filter' => $filter,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
			'snippetSize' => $snippetSize,
			'includeComments' => $includeComments,
			'teamId' => $teamId,
		]);
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
	public function teamMemberships(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingTeamMembershipsQueryRequest {
		return new PendingTeamMembershipsQueryRequest($this, [
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
	}
	
	/**
	 * @param string $id
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
	public function teams(
		?TeamFilterInput $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingTeamsQueryRequest {
		return new PendingTeamsQueryRequest($this, [
			'filter' => $filter,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
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
	public function administrableTeams(
		?TeamFilterInput $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingAdministrableTeamsQueryRequest {
		return new PendingAdministrableTeamsQueryRequest($this, [
			'filter' => $filter,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
	}
	
	/**
	 * @param string $id
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
	public function timeSchedules(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingTimeSchedulesQueryRequest {
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
	public function triageResponsibilities(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingTriageResponsibilitiesQueryRequest {
		return new PendingTriageResponsibilitiesQueryRequest($this, [
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
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
	 * @param ?UserFilterInput $filter filter returned users
	 * @param ?bool $includeDisabled should query return disabled/suspended users (default: false)
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingUsersQueryRequest
	 */
	public function users(
		?UserFilterInput $filter = null,
		?bool $includeDisabled = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingUsersQueryRequest {
		return new PendingUsersQueryRequest($this, [
			'filter' => $filter,
			'includeDisabled' => $includeDisabled,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
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
	 * @returns PendingUserSettingsQueryRequest
	 */
	public function userSettings(): PendingUserSettingsQueryRequest
	{
		return new PendingUserSettingsQueryRequest($this, []);
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
	public function webhooks(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingWebhooksQueryRequest {
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
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingWorkflowStatesQueryRequest
	 */
	public function workflowStates(
		?WorkflowStateFilterInput $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingWorkflowStatesQueryRequest {
		return new PendingWorkflowStatesQueryRequest($this, [
			'filter' => $filter,
			'before' => $before,
			'after' => $after,
			'first' => $first,
			'last' => $last,
			'includeArchived' => $includeArchived,
			'orderBy' => $orderBy,
		]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingWorkflowStateQueryRequest
	 */
	public function workflowState(string $id): PendingWorkflowStateQueryRequest
	{
		return new PendingWorkflowStateQueryRequest($this, ['id' => $id]);
	}
}
