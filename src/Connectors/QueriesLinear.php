<?php

namespace Glhd\Linearavel\Connectors;

use Glhd\Linearavel\Data\ApiKeyConnection;
use Glhd\Linearavel\Data\Application;
use Glhd\Linearavel\Data\Attachment;
use Glhd\Linearavel\Data\AttachmentConnection;
use Glhd\Linearavel\Data\AttachmentSourcesPayload;
use Glhd\Linearavel\Data\AuditEntryConnection;
use Glhd\Linearavel\Data\AuditEntryType;
use Glhd\Linearavel\Data\AuthenticationSessionResponse;
use Glhd\Linearavel\Data\AuthorizedApplication;
use Glhd\Linearavel\Data\AuthResolverResponse;
use Glhd\Linearavel\Data\Comment;
use Glhd\Linearavel\Data\CommentConnection;
use Glhd\Linearavel\Data\Contracts\Notification;
use Glhd\Linearavel\Data\Contracts\NotificationSubscription;
use Glhd\Linearavel\Data\CustomView;
use Glhd\Linearavel\Data\CustomViewConnection;
use Glhd\Linearavel\Data\CustomViewHasSubscribersPayload;
use Glhd\Linearavel\Data\CustomViewSuggestionPayload;
use Glhd\Linearavel\Data\Cycle;
use Glhd\Linearavel\Data\CycleConnection;
use Glhd\Linearavel\Data\Document;
use Glhd\Linearavel\Data\DocumentConnection;
use Glhd\Linearavel\Data\DocumentContentHistoryPayload;
use Glhd\Linearavel\Data\DocumentSearchPayload;
use Glhd\Linearavel\Data\Emoji;
use Glhd\Linearavel\Data\EmojiConnection;
use Glhd\Linearavel\Data\Enums\PaginationOrderBy;
use Glhd\Linearavel\Data\Enums\SendStrategy;
use Glhd\Linearavel\Data\ExternalUser;
use Glhd\Linearavel\Data\ExternalUserConnection;
use Glhd\Linearavel\Data\Favorite;
use Glhd\Linearavel\Data\FavoriteConnection;
use Glhd\Linearavel\Data\GithubOAuthTokenPayload;
use Glhd\Linearavel\Data\Initiative;
use Glhd\Linearavel\Data\InitiativeConnection;
use Glhd\Linearavel\Data\InitiativeToProject;
use Glhd\Linearavel\Data\InitiativeToProjectConnection;
use Glhd\Linearavel\Data\Integration;
use Glhd\Linearavel\Data\IntegrationConnection;
use Glhd\Linearavel\Data\IntegrationHasScopesPayload;
use Glhd\Linearavel\Data\IntegrationsSettings;
use Glhd\Linearavel\Data\IntegrationTemplate;
use Glhd\Linearavel\Data\IntegrationTemplateConnection;
use Glhd\Linearavel\Data\Issue;
use Glhd\Linearavel\Data\IssueConnection;
use Glhd\Linearavel\Data\IssueFilterSuggestionPayload;
use Glhd\Linearavel\Data\IssueImportCheckPayload;
use Glhd\Linearavel\Data\IssueLabel;
use Glhd\Linearavel\Data\IssueLabelConnection;
use Glhd\Linearavel\Data\IssuePriorityValue;
use Glhd\Linearavel\Data\IssueRelation;
use Glhd\Linearavel\Data\IssueRelationConnection;
use Glhd\Linearavel\Data\IssueSearchPayload;
use Glhd\Linearavel\Data\NotificationConnection;
use Glhd\Linearavel\Data\NotificationSubscriptionConnection;
use Glhd\Linearavel\Data\Organization;
use Glhd\Linearavel\Data\OrganizationDomainClaimPayload;
use Glhd\Linearavel\Data\OrganizationExistsPayload;
use Glhd\Linearavel\Data\OrganizationInvite;
use Glhd\Linearavel\Data\OrganizationInviteConnection;
use Glhd\Linearavel\Data\OrganizationInviteDetailsPayload;
use Glhd\Linearavel\Data\Project;
use Glhd\Linearavel\Data\ProjectConnection;
use Glhd\Linearavel\Data\ProjectFilterSuggestionPayload;
use Glhd\Linearavel\Data\ProjectLink;
use Glhd\Linearavel\Data\ProjectLinkConnection;
use Glhd\Linearavel\Data\ProjectMilestone;
use Glhd\Linearavel\Data\ProjectMilestoneConnection;
use Glhd\Linearavel\Data\ProjectSearchPayload;
use Glhd\Linearavel\Data\ProjectUpdate;
use Glhd\Linearavel\Data\ProjectUpdateConnection;
use Glhd\Linearavel\Data\ProjectUpdateInteraction;
use Glhd\Linearavel\Data\ProjectUpdateInteractionConnection;
use Glhd\Linearavel\Data\PushSubscriptionTestPayload;
use Glhd\Linearavel\Data\RateLimitPayload;
use Glhd\Linearavel\Data\Roadmap;
use Glhd\Linearavel\Data\RoadmapConnection;
use Glhd\Linearavel\Data\RoadmapToProject;
use Glhd\Linearavel\Data\RoadmapToProjectConnection;
use Glhd\Linearavel\Data\SsoUrlFromEmailResponse;
use Glhd\Linearavel\Data\Team;
use Glhd\Linearavel\Data\TeamConnection;
use Glhd\Linearavel\Data\TeamMembership;
use Glhd\Linearavel\Data\TeamMembershipConnection;
use Glhd\Linearavel\Data\Template;
use Glhd\Linearavel\Data\TimeSchedule;
use Glhd\Linearavel\Data\TimeScheduleConnection;
use Glhd\Linearavel\Data\TriageResponsibility;
use Glhd\Linearavel\Data\TriageResponsibilityConnection;
use Glhd\Linearavel\Data\User;
use Glhd\Linearavel\Data\UserAuthorizedApplication;
use Glhd\Linearavel\Data\UserConnection;
use Glhd\Linearavel\Data\UserSettings;
use Glhd\Linearavel\Data\Webhook;
use Glhd\Linearavel\Data\WebhookConnection;
use Glhd\Linearavel\Data\WorkflowState;
use Glhd\Linearavel\Data\WorkflowStateConnection;
use Glhd\Linearavel\Data\WorkspaceAuthorizedApplication;
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
use Glhd\Linearavel\Requests\PendingLinearObjectRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;

trait QueriesLinear
{
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<ApiKeyConnection>
	 */
	public function apiKeys(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingLinearRequest
	{
		return $this->linearQuery('apiKeys', ApiKeyConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $clientId the client ID of the application
	 * @returns PendingLinearRequest<Application>
	 */
	public function applicationInfo(string $clientId): PendingLinearRequest
	{
		return $this->linearQuery('applicationInfo', Application::class, false, compact('clientId'));
	}
	
	/**
	 * @param iterable $ids the IDs of the applications
	 * @returns PendingLinearRequest<Application>
	 */
	public function applicationInfoByIds(iterable $ids): PendingLinearRequest
	{
		return $this->linearQuery('applicationInfoByIds', Application::class, true, compact('ids'));
	}
	
	/**
	 * @param iterable $clientIds the client IDs to look up
	 * @returns PendingLinearRequest<WorkspaceAuthorizedApplication>
	 */
	public function applicationInfoWithMembershipsByIds(iterable $clientIds): PendingLinearRequest
	{
		return $this->linearQuery('applicationInfoWithMembershipsByIds', WorkspaceAuthorizedApplication::class, true, compact('clientIds'));
	}
	
	/**
	 * @param ?string $actor actor mode used for the authorization
	 * @param ?string $redirectUri redirect URI for the application
	 * @param iterable $scope scopes being requested by the application
	 * @param string $clientId the client ID of the application
	 * @returns PendingLinearRequest<UserAuthorizedApplication>
	 */
	public function applicationWithAuthorization(iterable $scope, string $clientId, ?string $actor = null, ?string $redirectUri = null): PendingLinearRequest
	{
		return $this->linearQuery('applicationWithAuthorization', UserAuthorizedApplication::class, false, compact('scope', 'clientId', 'actor', 'redirectUri'));
	}
	
	/**
	 * @returns PendingLinearRequest<AuthorizedApplication>
	 */
	public function authorizedApplications(): PendingLinearRequest
	{
		return $this->linearQuery('authorizedApplications', AuthorizedApplication::class, true);
	}
	
	/**
	 * @returns PendingLinearRequest<WorkspaceAuthorizedApplication>
	 */
	public function workspaceAuthorizedApplications(): PendingLinearRequest
	{
		return $this->linearQuery('workspaceAuthorizedApplications', WorkspaceAuthorizedApplication::class, true);
	}
	
	/**
	 * @param ?AttachmentFilter $filter filter returned attachments
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<AttachmentConnection>
	 */
	public function attachments(
		?AttachmentFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('attachments', AttachmentConnection::class, false, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<Attachment>
	 */
	public function attachment(string $id): PendingLinearRequest
	{
		return $this->linearQuery('attachment', Attachment::class, false, compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param string $url the attachment URL
	 * @returns PendingLinearRequest<AttachmentConnection>
	 */
	public function attachmentsForURL(
		string $url,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('attachmentsForURL', AttachmentConnection::class, false, compact('url', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id `id` of the attachment for which you'll want to get the issue for. [Deprecated] `url` as the `id` parameter.
	 * @returns PendingLinearRequest<Issue>
	 */
	public function attachmentIssue(string $id): PendingLinearRequest
	{
		return $this->linearQuery('attachmentIssue', Issue::class, false, compact('id'));
	}
	
	/**
	 * @param ?string $teamId (optional) if provided will only return attachment sources for the given team
	 * @returns PendingLinearRequest<AttachmentSourcesPayload>
	 */
	public function attachmentSources(?string $teamId = null): PendingLinearRequest
	{
		return $this->linearQuery('attachmentSources', AttachmentSourcesPayload::class, false, compact('teamId'));
	}
	
	/**
	 * @returns PendingLinearRequest<AuditEntryType>
	 */
	public function auditEntryTypes(): PendingLinearRequest
	{
		return $this->linearQuery('auditEntryTypes', AuditEntryType::class, true);
	}
	
	/**
	 * @param ?AuditEntryFilter $filter filter returned audit entries
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<AuditEntryConnection>
	 */
	public function auditEntries(
		?AuditEntryFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('auditEntries', AuditEntryConnection::class, false, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @returns PendingLinearRequest<AuthResolverResponse>
	 */
	public function availableUsers(): PendingLinearRequest
	{
		return $this->linearQuery('availableUsers', AuthResolverResponse::class, false);
	}
	
	/**
	 * @returns PendingLinearRequest<AuthenticationSessionResponse>
	 */
	public function authenticationSessions(): PendingLinearRequest
	{
		return $this->linearQuery('authenticationSessions', AuthenticationSessionResponse::class, true);
	}
	
	/**
	 * @param ?bool $isDesktop whether the client is the desktop app
	 * @param string $email email to query the SSO login URL by
	 * @returns PendingLinearRequest<SsoUrlFromEmailResponse>
	 */
	public function ssoUrlFromEmail(string $email, ?bool $isDesktop = null): PendingLinearRequest
	{
		return $this->linearQuery('ssoUrlFromEmail', SsoUrlFromEmailResponse::class, false, compact('email', 'isDesktop'));
	}
	
	/**
	 * @param ?CommentFilter $filter filter returned comments
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<CommentConnection>
	 */
	public function comments(
		?CommentFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('comments', CommentConnection::class, false, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param ?string $id the identifier of the comment to retrieve
	 * @param ?string $issueId [Deprecated] The issue for which to find the comment
	 * @param ?string $hash the hash of the comment to retrieve
	 * @returns PendingLinearRequest<Comment>
	 */
	public function comment(?string $id = null, ?string $issueId = null, ?string $hash = null): PendingLinearRequest
	{
		return $this->linearQuery('comment', Comment::class, false, compact('id', 'issueId', 'hash'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<CustomViewConnection>
	 */
	public function customViews(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingLinearRequest
	{
		return $this->linearQuery('customViews', CustomViewConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<CustomView>
	 */
	public function customView(string $id): PendingLinearRequest
	{
		return $this->linearQuery('customView', CustomView::class, false, compact('id'));
	}
	
	/**
	 * @param ?string $modelName
	 * @param string $filter
	 * @returns PendingLinearRequest<CustomViewSuggestionPayload>
	 */
	public function customViewDetailsSuggestion(string $filter, ?string $modelName = null): PendingLinearRequest
	{
		return $this->linearQuery('customViewDetailsSuggestion', CustomViewSuggestionPayload::class, false, compact('filter', 'modelName'));
	}
	
	/**
	 * @param string $id the identifier of the custom view
	 * @returns PendingLinearRequest<CustomViewHasSubscribersPayload>
	 */
	public function customViewHasSubscribers(string $id): PendingLinearRequest
	{
		return $this->linearQuery('customViewHasSubscribers', CustomViewHasSubscribersPayload::class, false, compact('id'));
	}
	
	/**
	 * @param ?CycleFilter $filter filter returned users
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<CycleConnection>
	 */
	public function cycles(
		?CycleFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('cycles', CycleConnection::class, false, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<Cycle>
	 */
	public function cycle(string $id): PendingLinearRequest
	{
		return $this->linearQuery('cycle', Cycle::class, false, compact('id'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<DocumentContentHistoryPayload>
	 */
	public function documentContentHistory(string $id): PendingLinearRequest
	{
		return $this->linearQuery('documentContentHistory', DocumentContentHistoryPayload::class, false, compact('id'));
	}
	
	/**
	 * @param ?DocumentFilter $filter filter returned documents
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<DocumentConnection>
	 */
	public function documents(
		?DocumentFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('documents', DocumentConnection::class, false, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<Document>
	 */
	public function document(string $id): PendingLinearRequest
	{
		return $this->linearQuery('document', Document::class, false, compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<EmojiConnection>
	 */
	public function emojis(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingLinearRequest
	{
		return $this->linearQuery('emojis', EmojiConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id the identifier or the name of the emoji to retrieve
	 * @returns PendingLinearRequest<Emoji>
	 */
	public function emoji(string $id): PendingLinearRequest
	{
		return $this->linearQuery('emoji', Emoji::class, false, compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<ExternalUserConnection>
	 */
	public function externalUsers(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('externalUsers', ExternalUserConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id the identifier of the external user to retrieve
	 * @returns PendingLinearRequest<ExternalUser>
	 */
	public function externalUser(string $id): PendingLinearRequest
	{
		return $this->linearQuery('externalUser', ExternalUser::class, false, compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<InitiativeToProjectConnection>
	 */
	public function initiativeToProjects(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('initiativeToProjects', InitiativeToProjectConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<InitiativeToProject>
	 */
	public function initiativeToProject(string $id): PendingLinearRequest
	{
		return $this->linearQuery('initiativeToProject', InitiativeToProject::class, false, compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<InitiativeConnection>
	 */
	public function initiatives(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingLinearRequest
	{
		return $this->linearQuery('initiatives', InitiativeConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<Initiative>
	 */
	public function initiative(string $id): PendingLinearRequest
	{
		return $this->linearQuery('initiative', Initiative::class, false, compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<FavoriteConnection>
	 */
	public function favorites(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingLinearRequest
	{
		return $this->linearQuery('favorites', FavoriteConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<Favorite>
	 */
	public function favorite(string $id): PendingLinearRequest
	{
		return $this->linearQuery('favorite', Favorite::class, false, compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<IntegrationConnection>
	 */
	public function integrations(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingLinearRequest
	{
		return $this->linearQuery('integrations', IntegrationConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<Integration>
	 */
	public function integration(string $id): PendingLinearRequest
	{
		return $this->linearQuery('integration', Integration::class, false, compact('id'));
	}
	
	/**
	 * @param iterable $scopes required scopes
	 * @param string $integrationId the integration ID
	 * @returns PendingLinearRequest<IntegrationHasScopesPayload>
	 */
	public function integrationHasScopes(iterable $scopes, string $integrationId): PendingLinearRequest
	{
		return $this->linearQuery('integrationHasScopes', IntegrationHasScopesPayload::class, false, compact('scopes', 'integrationId'));
	}
	
	/**
	 * @param ?ProjectUpdateFilter $filter filter returned project updates
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<ProjectUpdateConnection>
	 */
	public function projectUpdates(
		?ProjectUpdateFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('projectUpdates', ProjectUpdateConnection::class, false, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<IntegrationsSettings>
	 */
	public function integrationsSettings(string $id): PendingLinearRequest
	{
		return $this->linearQuery('integrationsSettings', IntegrationsSettings::class, false, compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<IntegrationTemplateConnection>
	 */
	public function integrationTemplates(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('integrationTemplates', IntegrationTemplateConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<IntegrationTemplate>
	 */
	public function integrationTemplate(string $id): PendingLinearRequest
	{
		return $this->linearQuery('integrationTemplate', IntegrationTemplate::class, false, compact('id'));
	}
	
	/**
	 * @param string $code OAuth code
	 * @returns PendingLinearRequest<GithubOAuthTokenPayload>
	 */
	public function issueImportFinishGithubOAuth(string $code): PendingLinearRequest
	{
		return $this->linearQuery('issueImportFinishGithubOAuth', GithubOAuthTokenPayload::class, false, compact('code'));
	}
	
	/**
	 * @param string $csvUrl CSV storage url
	 * @param string $service the service the CSV containing data from
	 * @returns PendingLinearRequest<IssueImportCheckPayload>
	 */
	public function issueImportCheckCSV(string $csvUrl, string $service): PendingLinearRequest
	{
		return $this->linearQuery('issueImportCheckCSV', IssueImportCheckPayload::class, false, compact('csvUrl', 'service'));
	}
	
	/**
	 * @param ?IssueLabelFilter $filter filter returned issue labels
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<IssueLabelConnection>
	 */
	public function issueLabels(
		?IssueLabelFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('issueLabels', IssueLabelConnection::class, false, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<IssueLabel>
	 */
	public function issueLabel(string $id): PendingLinearRequest
	{
		return $this->linearQuery('issueLabel', IssueLabel::class, false, compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<IssueRelationConnection>
	 */
	public function issueRelations(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('issueRelations', IssueRelationConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<IssueRelation>
	 */
	public function issueRelation(string $id): PendingLinearRequest
	{
		return $this->linearQuery('issueRelation', IssueRelation::class, false, compact('id'));
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
	 * @returns PendingLinearRequest<IssueConnection>
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
	): PendingLinearRequest {
		return $this->linearQuery('issues', IssueConnection::class, false, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy', 'sort'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<Issue>
	 */
	public function issue(string $id): PendingLinearRequest
	{
		return $this->linearQuery('issue', Issue::class, false, compact('id'));
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
	 * @returns PendingLinearRequest<IssueConnection>
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
	): PendingLinearRequest {
		return $this->linearQuery('issueSearch', IssueConnection::class, false, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy', 'query'));
	}
	
	/**
	 * @param string $branchName the VCS branch name to search for
	 * @returns PendingLinearRequest<Issue>
	 */
	public function issueVcsBranchSearch(string $branchName): PendingLinearRequest
	{
		return $this->linearQuery('issueVcsBranchSearch', Issue::class, false, compact('branchName'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param string $fileKey the Figma file key
	 * @returns PendingLinearRequest<IssueConnection>
	 */
	public function issueFigmaFileKeySearch(
		string $fileKey,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('issueFigmaFileKeySearch', IssueConnection::class, false, compact('fileKey', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @returns PendingLinearRequest<IssuePriorityValue>
	 */
	public function issuePriorityValues(): PendingLinearRequest
	{
		return $this->linearQuery('issuePriorityValues', IssuePriorityValue::class, true);
	}
	
	/**
	 * @param ?string $projectId The ID of the project if filtering a project view
	 * @param string $prompt
	 * @returns PendingLinearRequest<IssueFilterSuggestionPayload>
	 */
	public function issueFilterSuggestion(string $prompt, ?string $projectId = null): PendingLinearRequest
	{
		return $this->linearQuery('issueFilterSuggestion', IssueFilterSuggestionPayload::class, false, compact('prompt', 'projectId'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<NotificationConnection>
	 */
	public function notifications(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('notifications', NotificationConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<Notification>
	 */
	public function notification(string $id): PendingLinearRequest
	{
		return $this->linearQuery('notification', Notification::class, false, compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<NotificationSubscriptionConnection>
	 */
	public function notificationSubscriptions(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('notificationSubscriptions', NotificationSubscriptionConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<NotificationSubscription>
	 */
	public function notificationSubscription(string $id): PendingLinearRequest
	{
		return $this->linearQuery('notificationSubscription', NotificationSubscription::class, false, compact('id'));
	}
	
	/**
	 * @param string $id the ID of the organization domain to claim
	 * @returns PendingLinearRequest<OrganizationDomainClaimPayload>
	 */
	public function organizationDomainClaimRequest(string $id): PendingLinearRequest
	{
		return $this->linearQuery('organizationDomainClaimRequest', OrganizationDomainClaimPayload::class, false, compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<OrganizationInviteConnection>
	 */
	public function organizationInvites(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('organizationInvites', OrganizationInviteConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<OrganizationInvite>
	 */
	public function organizationInvite(string $id): PendingLinearRequest
	{
		return $this->linearQuery('organizationInvite', OrganizationInvite::class, false, compact('id'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<OrganizationInviteDetailsPayload>
	 */
	public function organizationInviteDetails(string $id): PendingLinearRequest
	{
		return $this->linearQuery('organizationInviteDetails', OrganizationInviteDetailsPayload::class, false, compact('id'));
	}
	
	/**
	 * @returns PendingLinearRequest<Organization>
	 */
	public function organization(): PendingLinearRequest
	{
		return $this->linearQuery('organization', Organization::class, false);
	}
	
	/**
	 * @param string $urlKey
	 * @returns PendingLinearRequest<OrganizationExistsPayload>
	 */
	public function organizationExists(string $urlKey): PendingLinearRequest
	{
		return $this->linearQuery('organizationExists', OrganizationExistsPayload::class, false, compact('urlKey'));
	}
	
	/**
	 * @returns PendingLinearRequest<Team>
	 */
	public function archivedTeams(): PendingLinearRequest
	{
		return $this->linearQuery('archivedTeams', Team::class, true);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<ProjectLinkConnection>
	 */
	public function projectLinks(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingLinearRequest
	{
		return $this->linearQuery('projectLinks', ProjectLinkConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<ProjectLink>
	 */
	public function projectLink(string $id): PendingLinearRequest
	{
		return $this->linearQuery('projectLink', ProjectLink::class, false, compact('id'));
	}
	
	/**
	 * @param ?ProjectMilestoneFilter $filter filter returned project milestones
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<ProjectMilestoneConnection>
	 */
	public function projectMilestones(
		?ProjectMilestoneFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('projectMilestones', ProjectMilestoneConnection::class, false, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<ProjectMilestone>
	 */
	public function projectMilestone(string $id): PendingLinearRequest
	{
		return $this->linearQuery('projectMilestone', ProjectMilestone::class, false, compact('id'));
	}
	
	/**
	 * @param ?ProjectFilter $filter filter returned projects
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<ProjectConnection>
	 */
	public function projects(
		?ProjectFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('projects', ProjectConnection::class, false, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<Project>
	 */
	public function project(string $id): PendingLinearRequest
	{
		return $this->linearQuery('project', Project::class, false, compact('id'));
	}
	
	/**
	 * @param string $prompt
	 * @returns PendingLinearRequest<ProjectFilterSuggestionPayload>
	 */
	public function projectFilterSuggestion(string $prompt): PendingLinearRequest
	{
		return $this->linearQuery('projectFilterSuggestion', ProjectFilterSuggestionPayload::class, false, compact('prompt'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<ProjectUpdateInteractionConnection>
	 */
	public function projectUpdateInteractions(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('projectUpdateInteractions', ProjectUpdateInteractionConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id the identifier of the project update interaction to retrieve
	 * @returns PendingLinearRequest<ProjectUpdateInteraction>
	 */
	public function projectUpdateInteraction(string $id): PendingLinearRequest
	{
		return $this->linearQuery('projectUpdateInteraction', ProjectUpdateInteraction::class, false, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the project update to retrieve
	 * @returns PendingLinearRequest<ProjectUpdate>
	 */
	public function projectUpdate(string $id): PendingLinearRequest
	{
		return $this->linearQuery('projectUpdate', ProjectUpdate::class, false, compact('id'));
	}
	
	/**
	 * @param ?bool $targetMobile whether to send to mobile devices
	 * @param ?SendStrategy $sendStrategy the send strategy to use
	 * @returns PendingLinearRequest<PushSubscriptionTestPayload>
	 */
	public function pushSubscriptionTest(?bool $targetMobile = null, ?SendStrategy $sendStrategy = null): PendingLinearRequest
	{
		return $this->linearQuery('pushSubscriptionTest', PushSubscriptionTestPayload::class, false, compact('targetMobile', 'sendStrategy'));
	}
	
	/**
	 * @returns PendingLinearRequest<RateLimitPayload>
	 */
	public function rateLimitStatus(): PendingLinearRequest
	{
		return $this->linearQuery('rateLimitStatus', RateLimitPayload::class, false);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<RoadmapConnection>
	 */
	public function roadmaps(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingLinearRequest
	{
		return $this->linearQuery('roadmaps', RoadmapConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<Roadmap>
	 */
	public function roadmap(string $id): PendingLinearRequest
	{
		return $this->linearQuery('roadmap', Roadmap::class, false, compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<RoadmapToProjectConnection>
	 */
	public function roadmapToProjects(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('roadmapToProjects', RoadmapToProjectConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<RoadmapToProject>
	 */
	public function roadmapToProject(string $id): PendingLinearRequest
	{
		return $this->linearQuery('roadmapToProject', RoadmapToProject::class, false, compact('id'));
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
	 * @returns PendingLinearRequest<DocumentSearchPayload>
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
	): PendingLinearRequest {
		return $this->linearQuery('searchDocuments', DocumentSearchPayload::class, false, compact('term', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy', 'snippetSize', 'includeComments', 'teamId'));
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
	 * @returns PendingLinearRequest<ProjectSearchPayload>
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
	): PendingLinearRequest {
		return $this->linearQuery('searchProjects', ProjectSearchPayload::class, false, compact('term', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy', 'snippetSize', 'includeComments', 'teamId'));
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
	 * @returns PendingLinearRequest<IssueSearchPayload>
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
	): PendingLinearRequest {
		return $this->linearQuery('searchIssues', IssueSearchPayload::class, false, compact('term', 'filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy', 'snippetSize', 'includeComments', 'teamId'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<TeamMembershipConnection>
	 */
	public function teamMemberships(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('teamMemberships', TeamMembershipConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<TeamMembership>
	 */
	public function teamMembership(string $id): PendingLinearRequest
	{
		return $this->linearQuery('teamMembership', TeamMembership::class, false, compact('id'));
	}
	
	/**
	 * @param ?TeamFilter $filter filter returned teams
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<TeamConnection>
	 */
	public function teams(
		?TeamFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('teams', TeamConnection::class, false, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param ?TeamFilter $filter filter returned teams
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<TeamConnection>
	 */
	public function administrableTeams(
		?TeamFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('administrableTeams', TeamConnection::class, false, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<Team>
	 */
	public function team(string $id): PendingLinearRequest
	{
		return $this->linearQuery('team', Team::class, false, compact('id'));
	}
	
	/**
	 * @returns PendingLinearRequest<Template>
	 */
	public function templates(): PendingLinearRequest
	{
		return $this->linearQuery('templates', Template::class, true);
	}
	
	/**
	 * @param string $id the identifier of the template to retrieve
	 * @returns PendingLinearRequest<Template>
	 */
	public function template(string $id): PendingLinearRequest
	{
		return $this->linearQuery('template', Template::class, false, compact('id'));
	}
	
	/**
	 * @param string $integrationType the type of integration for which to return associated templates
	 * @returns PendingLinearRequest<Template>
	 */
	public function templatesForIntegration(string $integrationType): PendingLinearRequest
	{
		return $this->linearQuery('templatesForIntegration', Template::class, true, compact('integrationType'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<TimeScheduleConnection>
	 */
	public function timeSchedules(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('timeSchedules', TimeScheduleConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id the identifier of the time schedule to retrieve
	 * @returns PendingLinearRequest<TimeSchedule>
	 */
	public function timeSchedule(string $id): PendingLinearRequest
	{
		return $this->linearQuery('timeSchedule', TimeSchedule::class, false, compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<TriageResponsibilityConnection>
	 */
	public function triageResponsibilities(
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('triageResponsibilities', TriageResponsibilityConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id the identifier of the triage responsibility to retrieve
	 * @returns PendingLinearRequest<TriageResponsibility>
	 */
	public function triageResponsibility(string $id): PendingLinearRequest
	{
		return $this->linearQuery('triageResponsibility', TriageResponsibility::class, false, compact('id'));
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
	 * @returns PendingLinearRequest<UserConnection>
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
	): PendingLinearRequest {
		return $this->linearQuery('users', UserConnection::class, false, compact('filter', 'includeDisabled', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id The identifier of the user to retrieve. To retrieve the authenticated user, use `viewer` query.
	 * @returns PendingLinearRequest<User>
	 */
	public function user(string $id): PendingLinearRequest
	{
		return $this->linearQuery('user', User::class, false, compact('id'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<User>
	 */
	public function viewer(): PendingLinearObjectRequest
	{
		$this->viewer()->get()->resolve();
		return $this->linearObjectQuery('viewer', User::class);
	}
	
	/**
	 * @returns PendingLinearRequest<UserSettings>
	 */
	public function userSettings(): PendingLinearRequest
	{
		return $this->linearQuery('userSettings', UserSettings::class, false);
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<WebhookConnection>
	 */
	public function webhooks(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null): PendingLinearRequest
	{
		return $this->linearQuery('webhooks', WebhookConnection::class, false, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id the identifier of the webhook to retrieve
	 * @returns PendingLinearRequest<Webhook>
	 */
	public function webhook(string $id): PendingLinearRequest
	{
		return $this->linearQuery('webhook', Webhook::class, false, compact('id'));
	}
	
	/**
	 * @param ?WorkflowStateFilter $filter filter returned workflow states
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearRequest<WorkflowStateConnection>
	 */
	public function workflowStates(
		?WorkflowStateFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	): PendingLinearRequest {
		return $this->linearQuery('workflowStates', WorkflowStateConnection::class, false, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearRequest<WorkflowState>
	 */
	public function workflowState(string $id): PendingLinearRequest
	{
		return $this->linearQuery('workflowState', WorkflowState::class, false, compact('id'));
	}
}
