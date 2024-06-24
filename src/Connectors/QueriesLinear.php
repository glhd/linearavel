<?php

namespace Glhd\Linearavel\Connectors;

use Glhd\Linearavel\Data\Enums\PaginationOrderBy;
use Glhd\Linearavel\Data\Enums\SendStrategy;
use Glhd\Linearavel\Requests\Inputs\AttachmentFilter;
use Glhd\Linearavel\Requests\Inputs\AuditEntryFilter;
use Glhd\Linearavel\Requests\Inputs\CommentFilter;
use Glhd\Linearavel\Requests\Inputs\CycleFilter;
use Glhd\Linearavel\Requests\Inputs\DocumentFilter;
use Glhd\Linearavel\Requests\Inputs\IssueFilter;
use Glhd\Linearavel\Requests\Inputs\IssueLabelFilter;
use Glhd\Linearavel\Requests\Inputs\ProjectFilter;
use Glhd\Linearavel\Requests\Inputs\ProjectMilestoneFilter;
use Glhd\Linearavel\Requests\Inputs\ProjectUpdateFilter;
use Glhd\Linearavel\Requests\Inputs\TeamFilter;
use Glhd\Linearavel\Requests\Inputs\UserFilter;
use Glhd\Linearavel\Requests\Inputs\WorkflowStateFilter;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAdministrableTeamsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingApiKeysRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingApplicationInfoByIdsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingApplicationInfoRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingApplicationInfoWithMembershipsByIdsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingApplicationWithAuthorizationRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingArchivedTeamsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAttachmentIssueRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAttachmentRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAttachmentsForURLRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAttachmentSourcesRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAttachmentsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAuditEntriesRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAuditEntryTypesRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAuthenticationSessionsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAuthorizedApplicationsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingAvailableUsersRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCommentRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCommentsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomViewDetailsSuggestionRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomViewHasSubscribersRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomViewRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCustomViewsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCycleRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingCyclesRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingDocumentContentHistoryRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingDocumentRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingDocumentsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingEmojiRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingEmojisRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingExternalUserRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingExternalUsersRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingFavoriteRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingFavoritesRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativesRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeToProjectRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingInitiativeToProjectsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIntegrationHasScopesRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIntegrationRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIntegrationsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIntegrationsSettingsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIntegrationTemplateRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIntegrationTemplatesRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueFigmaFileKeySearchRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueFilterSuggestionRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueImportCheckCSVRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueImportFinishGithubOAuthRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueLabelRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueLabelsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssuePriorityValuesRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueRelationRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueRelationsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueSearchRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssuesRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingIssueVcsBranchSearchRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingNotificationRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingNotificationsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingNotificationSubscriptionRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingNotificationSubscriptionsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOrganizationDomainClaimRequestRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOrganizationExistsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOrganizationInviteDetailsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOrganizationInviteRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOrganizationInvitesRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingOrganizationRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectFilterSuggestionRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectLinkRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectLinksRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectMilestoneRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectMilestonesRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectUpdateInteractionRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectUpdateInteractionsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingProjectUpdatesRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingPushSubscriptionTestRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingRateLimitStatusRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingRoadmapRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingRoadmapsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingRoadmapToProjectRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingRoadmapToProjectsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingSearchDocumentsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingSearchIssuesRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingSearchProjectsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingSsoUrlFromEmailRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTeamMembershipRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTeamMembershipsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTeamRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTeamsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTemplateRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTemplatesForIntegrationRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTemplatesRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTimeScheduleRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTimeSchedulesRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTriageResponsibilitiesRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingTriageResponsibilityRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingUserRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingUserSettingsRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingUsersRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingViewerRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingWebhookRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingWebhooksRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingWorkflowStateRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingWorkflowStatesRequest;
use Glhd\Linearavel\Requests\Pending\Queries\PendingWorkspaceAuthorizedApplicationsRequest;

trait QueriesLinear
{
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingApiKeysRequest
	 */
	public function apiKeys(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingApiKeysRequest {
		return new PendingApiKeysRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $clientId the client ID of the application
	 * @returns PendingApplicationInfoRequest
	 */
	public function applicationInfo(string $clientId): PendingApplicationInfoRequest
	{
		return new PendingApplicationInfoRequest($this, ['clientId' => $clientId]);
	}
	
	/**
	 * @param iterable $ids the IDs of the applications
	 * @returns PendingApplicationInfoByIdsRequest
	 */
	public function applicationInfoByIds(iterable $ids): PendingApplicationInfoByIdsRequest
	{
		return new PendingApplicationInfoByIdsRequest($this, ['ids' => $ids]);
	}
	
	/**
	 * @param iterable $clientIds the client IDs to look up
	 * @returns PendingApplicationInfoWithMembershipsByIdsRequest
	 */
	public function applicationInfoWithMembershipsByIds(iterable $clientIds): PendingApplicationInfoWithMembershipsByIdsRequest
	{
		return new PendingApplicationInfoWithMembershipsByIdsRequest($this, ['clientIds' => $clientIds]);
	}
	
	/**
	 * @param ?string $actor actor mode used for the authorization
	 * @param ?string $redirectUri redirect URI for the application
	 * @param iterable $scope scopes being requested by the application
	 * @param string $clientId the client ID of the application
	 * @returns PendingApplicationWithAuthorizationRequest
	 */
	public function applicationWithAuthorization(iterable $scope, string $clientId, ?string $actor = null, ?string $redirectUri = null): PendingApplicationWithAuthorizationRequest
	{
		return new PendingApplicationWithAuthorizationRequest($this, ['scope' => $scope, 'clientId' => $clientId, 'actor' => $actor, 'redirectUri' => $redirectUri]);
	}
	
	/**
	 * @returns PendingAuthorizedApplicationsRequest
	 */
	public function authorizedApplications(): PendingAuthorizedApplicationsRequest
	{
		return new PendingAuthorizedApplicationsRequest($this, []);
	}
	
	/**
	 * @returns PendingWorkspaceAuthorizedApplicationsRequest
	 */
	public function workspaceAuthorizedApplications(): PendingWorkspaceAuthorizedApplicationsRequest
	{
		return new PendingWorkspaceAuthorizedApplicationsRequest($this, []);
	}
	
	/**
	 * @param ?AttachmentFilter $filter filter returned attachments
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingAttachmentsRequest
	 */
	public function attachments(
		?AttachmentFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingAttachmentsRequest {
		return new PendingAttachmentsRequest($this, [
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
	 * @returns PendingAttachmentRequest
	 */
	public function attachment(string $id): PendingAttachmentRequest
	{
		return new PendingAttachmentRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param string $url the attachment URL
	 * @returns PendingAttachmentsForURLRequest
	 */
	public function attachmentsForURL(
		string $url,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingAttachmentsForURLRequest {
		return new PendingAttachmentsForURLRequest($this, [
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
	 * @returns PendingAttachmentIssueRequest
	 */
	public function attachmentIssue(string $id): PendingAttachmentIssueRequest
	{
		return new PendingAttachmentIssueRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?string $teamId (optional) if provided will only return attachment sources for the given team
	 * @returns PendingAttachmentSourcesRequest
	 */
	public function attachmentSources(?string $teamId = null): PendingAttachmentSourcesRequest
	{
		return new PendingAttachmentSourcesRequest($this, ['teamId' => $teamId]);
	}
	
	/**
	 * @returns PendingAuditEntryTypesRequest
	 */
	public function auditEntryTypes(): PendingAuditEntryTypesRequest
	{
		return new PendingAuditEntryTypesRequest($this, []);
	}
	
	/**
	 * @param ?AuditEntryFilter $filter filter returned audit entries
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingAuditEntriesRequest
	 */
	public function auditEntries(
		?AuditEntryFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingAuditEntriesRequest {
		return new PendingAuditEntriesRequest($this, [
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
	 * @returns PendingAvailableUsersRequest
	 */
	public function availableUsers(): PendingAvailableUsersRequest
	{
		return new PendingAvailableUsersRequest($this, []);
	}
	
	/**
	 * @returns PendingAuthenticationSessionsRequest
	 */
	public function authenticationSessions(): PendingAuthenticationSessionsRequest
	{
		return new PendingAuthenticationSessionsRequest($this, []);
	}
	
	/**
	 * @param ?bool $isDesktop whether the client is the desktop app
	 * @param string $email email to query the SSO login URL by
	 * @returns PendingSsoUrlFromEmailRequest
	 */
	public function ssoUrlFromEmail(string $email, ?bool $isDesktop = null): PendingSsoUrlFromEmailRequest
	{
		return new PendingSsoUrlFromEmailRequest($this, ['email' => $email, 'isDesktop' => $isDesktop]);
	}
	
	/**
	 * @param ?CommentFilter $filter filter returned comments
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingCommentsRequest
	 */
	public function comments(
		?CommentFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingCommentsRequest {
		return new PendingCommentsRequest($this, [
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
	 * @returns PendingCommentRequest
	 */
	public function comment(?string $id = null, ?string $issueId = null, ?string $hash = null): PendingCommentRequest
	{
		return new PendingCommentRequest($this, ['id' => $id, 'issueId' => $issueId, 'hash' => $hash]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingCustomViewsRequest
	 */
	public function customViews(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingCustomViewsRequest {
		return new PendingCustomViewsRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingCustomViewRequest
	 */
	public function customView(string $id): PendingCustomViewRequest
	{
		return new PendingCustomViewRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?string $modelName
	 * @param string $filter
	 * @returns PendingCustomViewDetailsSuggestionRequest
	 */
	public function customViewDetailsSuggestion(string $filter, ?string $modelName = null): PendingCustomViewDetailsSuggestionRequest
	{
		return new PendingCustomViewDetailsSuggestionRequest($this, ['filter' => $filter, 'modelName' => $modelName]);
	}
	
	/**
	 * @param string $id the identifier of the custom view
	 * @returns PendingCustomViewHasSubscribersRequest
	 */
	public function customViewHasSubscribers(string $id): PendingCustomViewHasSubscribersRequest
	{
		return new PendingCustomViewHasSubscribersRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?CycleFilter $filter filter returned users
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingCyclesRequest
	 */
	public function cycles(
		?CycleFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingCyclesRequest {
		return new PendingCyclesRequest($this, [
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
	 * @returns PendingCycleRequest
	 */
	public function cycle(string $id): PendingCycleRequest
	{
		return new PendingCycleRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingDocumentContentHistoryRequest
	 */
	public function documentContentHistory(string $id): PendingDocumentContentHistoryRequest
	{
		return new PendingDocumentContentHistoryRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?DocumentFilter $filter filter returned documents
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingDocumentsRequest
	 */
	public function documents(
		?DocumentFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingDocumentsRequest {
		return new PendingDocumentsRequest($this, [
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
	 * @returns PendingDocumentRequest
	 */
	public function document(string $id): PendingDocumentRequest
	{
		return new PendingDocumentRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingEmojisRequest
	 */
	public function emojis(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingEmojisRequest {
		return new PendingEmojisRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id the identifier or the name of the emoji to retrieve
	 * @returns PendingEmojiRequest
	 */
	public function emoji(string $id): PendingEmojiRequest
	{
		return new PendingEmojiRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingExternalUsersRequest
	 */
	public function externalUsers(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingExternalUsersRequest {
		return new PendingExternalUsersRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id the identifier of the external user to retrieve
	 * @returns PendingExternalUserRequest
	 */
	public function externalUser(string $id): PendingExternalUserRequest
	{
		return new PendingExternalUserRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingInitiativeToProjectsRequest
	 */
	public function initiativeToProjects(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingInitiativeToProjectsRequest {
		return new PendingInitiativeToProjectsRequest($this, [
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
	 * @returns PendingInitiativeToProjectRequest
	 */
	public function initiativeToProject(string $id): PendingInitiativeToProjectRequest
	{
		return new PendingInitiativeToProjectRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingInitiativesRequest
	 */
	public function initiatives(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingInitiativesRequest {
		return new PendingInitiativesRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingInitiativeRequest
	 */
	public function initiative(string $id): PendingInitiativeRequest
	{
		return new PendingInitiativeRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingFavoritesRequest
	 */
	public function favorites(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingFavoritesRequest {
		return new PendingFavoritesRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingFavoriteRequest
	 */
	public function favorite(string $id): PendingFavoriteRequest
	{
		return new PendingFavoriteRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingIntegrationsRequest
	 */
	public function integrations(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingIntegrationsRequest {
		return new PendingIntegrationsRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingIntegrationRequest
	 */
	public function integration(string $id): PendingIntegrationRequest
	{
		return new PendingIntegrationRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param iterable $scopes required scopes
	 * @param string $integrationId the integration ID
	 * @returns PendingIntegrationHasScopesRequest
	 */
	public function integrationHasScopes(iterable $scopes, string $integrationId): PendingIntegrationHasScopesRequest
	{
		return new PendingIntegrationHasScopesRequest($this, ['scopes' => $scopes, 'integrationId' => $integrationId]);
	}
	
	/**
	 * @param ?ProjectUpdateFilter $filter filter returned project updates
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingProjectUpdatesRequest
	 */
	public function projectUpdates(
		?ProjectUpdateFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingProjectUpdatesRequest {
		return new PendingProjectUpdatesRequest($this, [
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
	 * @returns PendingIntegrationsSettingsRequest
	 */
	public function integrationsSettings(string $id): PendingIntegrationsSettingsRequest
	{
		return new PendingIntegrationsSettingsRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingIntegrationTemplatesRequest
	 */
	public function integrationTemplates(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingIntegrationTemplatesRequest {
		return new PendingIntegrationTemplatesRequest($this, [
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
	 * @returns PendingIntegrationTemplateRequest
	 */
	public function integrationTemplate(string $id): PendingIntegrationTemplateRequest
	{
		return new PendingIntegrationTemplateRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param string $code OAuth code
	 * @returns PendingIssueImportFinishGithubOAuthRequest
	 */
	public function issueImportFinishGithubOAuth(string $code): PendingIssueImportFinishGithubOAuthRequest
	{
		return new PendingIssueImportFinishGithubOAuthRequest($this, ['code' => $code]);
	}
	
	/**
	 * @param string $csvUrl CSV storage url
	 * @param string $service the service the CSV containing data from
	 * @returns PendingIssueImportCheckCSVRequest
	 */
	public function issueImportCheckCSV(string $csvUrl, string $service): PendingIssueImportCheckCSVRequest
	{
		return new PendingIssueImportCheckCSVRequest($this, ['csvUrl' => $csvUrl, 'service' => $service]);
	}
	
	/**
	 * @param ?IssueLabelFilter $filter filter returned issue labels
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingIssueLabelsRequest
	 */
	public function issueLabels(
		?IssueLabelFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingIssueLabelsRequest {
		return new PendingIssueLabelsRequest($this, [
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
	 * @returns PendingIssueLabelRequest
	 */
	public function issueLabel(string $id): PendingIssueLabelRequest
	{
		return new PendingIssueLabelRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingIssueRelationsRequest
	 */
	public function issueRelations(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingIssueRelationsRequest {
		return new PendingIssueRelationsRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingIssueRelationRequest
	 */
	public function issueRelation(string $id): PendingIssueRelationRequest
	{
		return new PendingIssueRelationRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?IssueFilter $filter filter returned issues
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param ?iterable $sort [INTERNAL] Sort returned issues
	 * @returns PendingIssuesRequest
	 */
	public function issues(
		?IssueFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null,
		?iterable $sort = null
	): PendingIssuesRequest {
		return new PendingIssuesRequest($this, [
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
	 * @returns PendingIssueRequest
	 */
	public function issue(string $id): PendingIssueRequest
	{
		return new PendingIssueRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?IssueFilter $filter filter returned issues
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param ?string $query [Deprecated] Search string to look for
	 * @returns PendingIssueSearchRequest
	 */
	public function issueSearch(
		?IssueFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null,
		?string $query = null
	): PendingIssueSearchRequest {
		return new PendingIssueSearchRequest($this, [
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
	 * @returns PendingIssueVcsBranchSearchRequest
	 */
	public function issueVcsBranchSearch(string $branchName): PendingIssueVcsBranchSearchRequest
	{
		return new PendingIssueVcsBranchSearchRequest($this, ['branchName' => $branchName]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param string $fileKey the Figma file key
	 * @returns PendingIssueFigmaFileKeySearchRequest
	 */
	public function issueFigmaFileKeySearch(
		string $fileKey,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingIssueFigmaFileKeySearchRequest {
		return new PendingIssueFigmaFileKeySearchRequest($this, [
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
	 * @returns PendingIssuePriorityValuesRequest
	 */
	public function issuePriorityValues(): PendingIssuePriorityValuesRequest
	{
		return new PendingIssuePriorityValuesRequest($this, []);
	}
	
	/**
	 * @param ?string $projectId The ID of the project if filtering a project view
	 * @param string $prompt
	 * @returns PendingIssueFilterSuggestionRequest
	 */
	public function issueFilterSuggestion(string $prompt, ?string $projectId = null): PendingIssueFilterSuggestionRequest
	{
		return new PendingIssueFilterSuggestionRequest($this, ['prompt' => $prompt, 'projectId' => $projectId]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingNotificationsRequest
	 */
	public function notifications(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingNotificationsRequest {
		return new PendingNotificationsRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingNotificationRequest
	 */
	public function notification(string $id): PendingNotificationRequest
	{
		return new PendingNotificationRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingNotificationSubscriptionsRequest
	 */
	public function notificationSubscriptions(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingNotificationSubscriptionsRequest {
		return new PendingNotificationSubscriptionsRequest($this, [
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
	 * @returns PendingNotificationSubscriptionRequest
	 */
	public function notificationSubscription(string $id): PendingNotificationSubscriptionRequest
	{
		return new PendingNotificationSubscriptionRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param string $id the ID of the organization domain to claim
	 * @returns PendingOrganizationDomainClaimRequestRequest
	 */
	public function organizationDomainClaimRequest(string $id): PendingOrganizationDomainClaimRequestRequest
	{
		return new PendingOrganizationDomainClaimRequestRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingOrganizationInvitesRequest
	 */
	public function organizationInvites(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingOrganizationInvitesRequest {
		return new PendingOrganizationInvitesRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingOrganizationInviteRequest
	 */
	public function organizationInvite(string $id): PendingOrganizationInviteRequest
	{
		return new PendingOrganizationInviteRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingOrganizationInviteDetailsRequest
	 */
	public function organizationInviteDetails(string $id): PendingOrganizationInviteDetailsRequest
	{
		return new PendingOrganizationInviteDetailsRequest($this, ['id' => $id]);
	}
	
	/**
	 * @returns PendingOrganizationRequest
	 */
	public function organization(): PendingOrganizationRequest
	{
		return new PendingOrganizationRequest($this, []);
	}
	
	/**
	 * @param string $urlKey
	 * @returns PendingOrganizationExistsRequest
	 */
	public function organizationExists(string $urlKey): PendingOrganizationExistsRequest
	{
		return new PendingOrganizationExistsRequest($this, ['urlKey' => $urlKey]);
	}
	
	/**
	 * @returns PendingArchivedTeamsRequest
	 */
	public function archivedTeams(): PendingArchivedTeamsRequest
	{
		return new PendingArchivedTeamsRequest($this, []);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingProjectLinksRequest
	 */
	public function projectLinks(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingProjectLinksRequest {
		return new PendingProjectLinksRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingProjectLinkRequest
	 */
	public function projectLink(string $id): PendingProjectLinkRequest
	{
		return new PendingProjectLinkRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?ProjectMilestoneFilter $filter filter returned project milestones
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingProjectMilestonesRequest
	 */
	public function projectMilestones(
		?ProjectMilestoneFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingProjectMilestonesRequest {
		return new PendingProjectMilestonesRequest($this, [
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
	 * @returns PendingProjectMilestoneRequest
	 */
	public function projectMilestone(string $id): PendingProjectMilestoneRequest
	{
		return new PendingProjectMilestoneRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?ProjectFilter $filter filter returned projects
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingProjectsRequest
	 */
	public function projects(
		?ProjectFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingProjectsRequest {
		return new PendingProjectsRequest($this, [
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
	 * @returns PendingProjectRequest
	 */
	public function project(string $id): PendingProjectRequest
	{
		return new PendingProjectRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param string $prompt
	 * @returns PendingProjectFilterSuggestionRequest
	 */
	public function projectFilterSuggestion(string $prompt): PendingProjectFilterSuggestionRequest
	{
		return new PendingProjectFilterSuggestionRequest($this, ['prompt' => $prompt]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingProjectUpdateInteractionsRequest
	 */
	public function projectUpdateInteractions(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingProjectUpdateInteractionsRequest {
		return new PendingProjectUpdateInteractionsRequest($this, [
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
	 * @returns PendingProjectUpdateInteractionRequest
	 */
	public function projectUpdateInteraction(string $id): PendingProjectUpdateInteractionRequest
	{
		return new PendingProjectUpdateInteractionRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param string $id the identifier of the project update to retrieve
	 * @returns PendingProjectUpdateRequest
	 */
	public function projectUpdate(string $id): PendingProjectUpdateRequest
	{
		return new PendingProjectUpdateRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?bool $targetMobile whether to send to mobile devices
	 * @param ?SendStrategy $sendStrategy the send strategy to use
	 * @returns PendingPushSubscriptionTestRequest
	 */
	public function pushSubscriptionTest(?bool $targetMobile = null, ?SendStrategy $sendStrategy = null): PendingPushSubscriptionTestRequest
	{
		return new PendingPushSubscriptionTestRequest($this, ['targetMobile' => $targetMobile, 'sendStrategy' => $sendStrategy]);
	}
	
	/**
	 * @returns PendingRateLimitStatusRequest
	 */
	public function rateLimitStatus(): PendingRateLimitStatusRequest
	{
		return new PendingRateLimitStatusRequest($this, []);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingRoadmapsRequest
	 */
	public function roadmaps(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingRoadmapsRequest {
		return new PendingRoadmapsRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingRoadmapRequest
	 */
	public function roadmap(string $id): PendingRoadmapRequest
	{
		return new PendingRoadmapRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingRoadmapToProjectsRequest
	 */
	public function roadmapToProjects(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingRoadmapToProjectsRequest {
		return new PendingRoadmapToProjectsRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingRoadmapToProjectRequest
	 */
	public function roadmapToProject(string $id): PendingRoadmapToProjectRequest
	{
		return new PendingRoadmapToProjectRequest($this, ['id' => $id]);
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
	 * @returns PendingSearchDocumentsRequest
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
	): PendingSearchDocumentsRequest {
		return new PendingSearchDocumentsRequest($this, [
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
	 * @returns PendingSearchProjectsRequest
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
	): PendingSearchProjectsRequest {
		return new PendingSearchProjectsRequest($this, [
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
	 * @param ?IssueFilter $filter filter returned issues
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
	 * @returns PendingSearchIssuesRequest
	 */
	public function searchIssues(
		string $term,
		?IssueFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null,
		?float $snippetSize = null,
		?bool $includeComments = null,
		?string $teamId = null
	): PendingSearchIssuesRequest {
		return new PendingSearchIssuesRequest($this, [
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
	 * @returns PendingTeamMembershipsRequest
	 */
	public function teamMemberships(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingTeamMembershipsRequest {
		return new PendingTeamMembershipsRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id
	 * @returns PendingTeamMembershipRequest
	 */
	public function teamMembership(string $id): PendingTeamMembershipRequest
	{
		return new PendingTeamMembershipRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?TeamFilter $filter filter returned teams
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingTeamsRequest
	 */
	public function teams(
		?TeamFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingTeamsRequest {
		return new PendingTeamsRequest($this, [
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
	 * @param ?TeamFilter $filter filter returned teams
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingAdministrableTeamsRequest
	 */
	public function administrableTeams(
		?TeamFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingAdministrableTeamsRequest {
		return new PendingAdministrableTeamsRequest($this, [
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
	 * @returns PendingTeamRequest
	 */
	public function team(string $id): PendingTeamRequest
	{
		return new PendingTeamRequest($this, ['id' => $id]);
	}
	
	/**
	 * @returns PendingTemplatesRequest
	 */
	public function templates(): PendingTemplatesRequest
	{
		return new PendingTemplatesRequest($this, []);
	}
	
	/**
	 * @param string $id the identifier of the template to retrieve
	 * @returns PendingTemplateRequest
	 */
	public function template(string $id): PendingTemplateRequest
	{
		return new PendingTemplateRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param string $integrationType the type of integration for which to return associated templates
	 * @returns PendingTemplatesForIntegrationRequest
	 */
	public function templatesForIntegration(string $integrationType): PendingTemplatesForIntegrationRequest
	{
		return new PendingTemplatesForIntegrationRequest($this, ['integrationType' => $integrationType]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingTimeSchedulesRequest
	 */
	public function timeSchedules(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingTimeSchedulesRequest {
		return new PendingTimeSchedulesRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id the identifier of the time schedule to retrieve
	 * @returns PendingTimeScheduleRequest
	 */
	public function timeSchedule(string $id): PendingTimeScheduleRequest
	{
		return new PendingTimeScheduleRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingTriageResponsibilitiesRequest
	 */
	public function triageResponsibilities(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingTriageResponsibilitiesRequest {
		return new PendingTriageResponsibilitiesRequest($this, [
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
	 * @returns PendingTriageResponsibilityRequest
	 */
	public function triageResponsibility(string $id): PendingTriageResponsibilityRequest
	{
		return new PendingTriageResponsibilityRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?UserFilter $filter filter returned users
	 * @param ?bool $includeDisabled should query return disabled/suspended users (default: false)
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingUsersRequest
	 */
	public function users(
		?UserFilter $filter = null,
		?bool $includeDisabled = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingUsersRequest {
		return new PendingUsersRequest($this, [
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
	 * @returns PendingUserRequest
	 */
	public function user(string $id): PendingUserRequest
	{
		return new PendingUserRequest($this, ['id' => $id]);
	}
	
	/**
	 * @returns PendingViewerRequest
	 */
	public function viewer(): PendingViewerRequest
	{
		return new PendingViewerRequest($this, []);
	}
	
	/**
	 * @returns PendingUserSettingsRequest
	 */
	public function userSettings(): PendingUserSettingsRequest
	{
		return new PendingUserSettingsRequest($this, []);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingWebhooksRequest
	 */
	public function webhooks(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingWebhooksRequest {
		return new PendingWebhooksRequest($this, ['before' => $before, 'after' => $after, 'first' => $first, 'last' => $last, 'includeArchived' => $includeArchived, 'orderBy' => $orderBy]);
	}
	
	/**
	 * @param string $id the identifier of the webhook to retrieve
	 * @returns PendingWebhookRequest
	 */
	public function webhook(string $id): PendingWebhookRequest
	{
		return new PendingWebhookRequest($this, ['id' => $id]);
	}
	
	/**
	 * @param ?WorkflowStateFilter $filter filter returned workflow states
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingWorkflowStatesRequest
	 */
	public function workflowStates(
		?WorkflowStateFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingWorkflowStatesRequest {
		return new PendingWorkflowStatesRequest($this, [
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
	 * @returns PendingWorkflowStateRequest
	 */
	public function workflowState(string $id): PendingWorkflowStateRequest
	{
		return new PendingWorkflowStateRequest($this, ['id' => $id]);
	}
}
