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
use Glhd\Linearavel\Requests\PendingLinearListRequest;
use Glhd\Linearavel\Requests\PendingLinearObjectRequest;

trait QueriesLinear
{
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<ApiKeyConnection>
	 */
	function apiKeys(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('apiKeys', ApiKeyConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $clientId The client ID of the application.
	 * @returns PendingLinearObjectRequest<Application>
	 */
	function applicationInfo(string $clientId)
	{
		return $this->linearObjectQuery('applicationInfo', Application::class, compact('clientId'));
	}
	
	/**
	 * @param iterable $ids The IDs of the applications.
	 * @returns PendingLinearListRequest<Application>
	 */
	function applicationInfoByIds(iterable $ids)
	{
		return $this->linearListQuery('applicationInfoByIds', Application::class, compact('ids'));
	}
	
	/**
	 * @param iterable $clientIds The client IDs to look up.
	 * @returns PendingLinearListRequest<WorkspaceAuthorizedApplication>
	 */
	function applicationInfoWithMembershipsByIds(iterable $clientIds)
	{
		return $this->linearListQuery('applicationInfoWithMembershipsByIds', WorkspaceAuthorizedApplication::class, compact('clientIds'));
	}
	
	/**
	 * @param ?string $actor Actor mode used for the authorization.
	 * @param ?string $redirectUri Redirect URI for the application.
	 * @param iterable $scope Scopes being requested by the application.
	 * @param string $clientId The client ID of the application.
	 * @returns PendingLinearObjectRequest<UserAuthorizedApplication>
	 */
	function applicationWithAuthorization(iterable $scope, string $clientId, ?string $actor = null, ?string $redirectUri = null)
	{
		return $this->linearObjectQuery('applicationWithAuthorization', UserAuthorizedApplication::class, compact('scope', 'clientId', 'actor', 'redirectUri'));
	}
	
	/**
	 * @returns PendingLinearListRequest<AuthorizedApplication>
	 */
	function authorizedApplications()
	{
		return $this->linearListQuery('authorizedApplications', AuthorizedApplication::class);
	}
	
	/**
	 * @returns PendingLinearListRequest<WorkspaceAuthorizedApplication>
	 */
	function workspaceAuthorizedApplications()
	{
		return $this->linearListQuery('workspaceAuthorizedApplications', WorkspaceAuthorizedApplication::class);
	}
	
	/**
	 * @param ?AttachmentFilter $filter Filter returned attachments.
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<AttachmentConnection>
	 */
	function attachments(
		?AttachmentFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearObjectQuery('attachments', AttachmentConnection::class, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<Attachment>
	 */
	function attachment(string $id)
	{
		return $this->linearObjectQuery('attachment', Attachment::class, compact('id'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param string $url The attachment URL.
	 * @returns PendingLinearObjectRequest<AttachmentConnection>
	 */
	function attachmentsForURL(string $url, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('attachmentsForURL', AttachmentConnection::class, compact('url', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id `id` of the attachment for which you'll want to get the issue for. [Deprecated] `url` as the `id` parameter.
	 * @returns PendingLinearObjectRequest<Issue>
	 */
	function attachmentIssue(string $id)
	{
		return $this->linearObjectQuery('attachmentIssue', Issue::class, compact('id'));
	}
	
	/**
	 * @param ?string $teamId (optional) if provided will only return attachment sources for the given team.
	 * @returns PendingLinearObjectRequest<AttachmentSourcesPayload>
	 */
	function attachmentSources(?string $teamId = null)
	{
		return $this->linearObjectQuery('attachmentSources', AttachmentSourcesPayload::class, compact('teamId'));
	}
	
	/**
	 * @returns PendingLinearListRequest<AuditEntryType>
	 */
	function auditEntryTypes()
	{
		return $this->linearListQuery('auditEntryTypes', AuditEntryType::class);
	}
	
	/**
	 * @param ?AuditEntryFilter $filter Filter returned audit entries.
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<AuditEntryConnection>
	 */
	function auditEntries(
		?AuditEntryFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearObjectQuery('auditEntries', AuditEntryConnection::class, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<AuthResolverResponse>
	 */
	function availableUsers()
	{
		return $this->linearObjectQuery('availableUsers', AuthResolverResponse::class);
	}
	
	/**
	 * @returns PendingLinearListRequest<AuthenticationSessionResponse>
	 */
	function authenticationSessions()
	{
		return $this->linearListQuery('authenticationSessions', AuthenticationSessionResponse::class);
	}
	
	/**
	 * @param ?bool $isDesktop Whether the client is the desktop app.
	 * @param string $email Email to query the SSO login URL by.
	 * @returns PendingLinearObjectRequest<SsoUrlFromEmailResponse>
	 */
	function ssoUrlFromEmail(string $email, ?bool $isDesktop = null)
	{
		return $this->linearObjectQuery('ssoUrlFromEmail', SsoUrlFromEmailResponse::class, compact('email', 'isDesktop'));
	}
	
	/**
	 * @param ?CommentFilter $filter Filter returned comments.
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<CommentConnection>
	 */
	function comments(
		?CommentFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearObjectQuery('comments', CommentConnection::class, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param ?string $id The identifier of the comment to retrieve.
	 * @param ?string $issueId [Deprecated] The issue for which to find the comment.
	 * @param ?string $hash The hash of the comment to retrieve.
	 * @returns PendingLinearObjectRequest<Comment>
	 */
	function comment(?string $id = null, ?string $issueId = null, ?string $hash = null)
	{
		return $this->linearObjectQuery('comment', Comment::class, compact('id', 'issueId', 'hash'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<CustomViewConnection>
	 */
	function customViews(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('customViews', CustomViewConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<CustomView>
	 */
	function customView(string $id)
	{
		return $this->linearObjectQuery('customView', CustomView::class, compact('id'));
	}
	
	/**
	 * @param ?string $modelName
	 * @param string $filter
	 * @returns PendingLinearObjectRequest<CustomViewSuggestionPayload>
	 */
	function customViewDetailsSuggestion(string $filter, ?string $modelName = null)
	{
		return $this->linearObjectQuery('customViewDetailsSuggestion', CustomViewSuggestionPayload::class, compact('filter', 'modelName'));
	}
	
	/**
	 * @param string $id The identifier of the custom view.
	 * @returns PendingLinearObjectRequest<CustomViewHasSubscribersPayload>
	 */
	function customViewHasSubscribers(string $id)
	{
		return $this->linearObjectQuery('customViewHasSubscribers', CustomViewHasSubscribersPayload::class, compact('id'));
	}
	
	/**
	 * @param ?CycleFilter $filter Filter returned users.
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<CycleConnection>
	 */
	function cycles(
		?CycleFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearObjectQuery('cycles', CycleConnection::class, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<Cycle>
	 */
	function cycle(string $id)
	{
		return $this->linearObjectQuery('cycle', Cycle::class, compact('id'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<DocumentContentHistoryPayload>
	 */
	function documentContentHistory(string $id)
	{
		return $this->linearObjectQuery('documentContentHistory', DocumentContentHistoryPayload::class, compact('id'));
	}
	
	/**
	 * @param ?DocumentFilter $filter Filter returned documents.
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<DocumentConnection>
	 */
	function documents(
		?DocumentFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearObjectQuery('documents', DocumentConnection::class, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<Document>
	 */
	function document(string $id)
	{
		return $this->linearObjectQuery('document', Document::class, compact('id'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<EmojiConnection>
	 */
	function emojis(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('emojis', EmojiConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id The identifier or the name of the emoji to retrieve.
	 * @returns PendingLinearObjectRequest<Emoji>
	 */
	function emoji(string $id)
	{
		return $this->linearObjectQuery('emoji', Emoji::class, compact('id'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<ExternalUserConnection>
	 */
	function externalUsers(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('externalUsers', ExternalUserConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id The identifier of the external user to retrieve.
	 * @returns PendingLinearObjectRequest<ExternalUser>
	 */
	function externalUser(string $id)
	{
		return $this->linearObjectQuery('externalUser', ExternalUser::class, compact('id'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<InitiativeToProjectConnection>
	 */
	function initiativeToProjects(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('initiativeToProjects', InitiativeToProjectConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<InitiativeToProject>
	 */
	function initiativeToProject(string $id)
	{
		return $this->linearObjectQuery('initiativeToProject', InitiativeToProject::class, compact('id'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<InitiativeConnection>
	 */
	function initiatives(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('initiatives', InitiativeConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<Initiative>
	 */
	function initiative(string $id)
	{
		return $this->linearObjectQuery('initiative', Initiative::class, compact('id'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<FavoriteConnection>
	 */
	function favorites(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('favorites', FavoriteConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<Favorite>
	 */
	function favorite(string $id)
	{
		return $this->linearObjectQuery('favorite', Favorite::class, compact('id'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<IntegrationConnection>
	 */
	function integrations(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('integrations', IntegrationConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<Integration>
	 */
	function integration(string $id)
	{
		return $this->linearObjectQuery('integration', Integration::class, compact('id'));
	}
	
	/**
	 * @param iterable $scopes Required scopes.
	 * @param string $integrationId The integration ID.
	 * @returns PendingLinearObjectRequest<IntegrationHasScopesPayload>
	 */
	function integrationHasScopes(iterable $scopes, string $integrationId)
	{
		return $this->linearObjectQuery('integrationHasScopes', IntegrationHasScopesPayload::class, compact('scopes', 'integrationId'));
	}
	
	/**
	 * @param ?ProjectUpdateFilter $filter Filter returned project updates.
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<ProjectUpdateConnection>
	 */
	function projectUpdates(
		?ProjectUpdateFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearObjectQuery('projectUpdates', ProjectUpdateConnection::class, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<IntegrationsSettings>
	 */
	function integrationsSettings(string $id)
	{
		return $this->linearObjectQuery('integrationsSettings', IntegrationsSettings::class, compact('id'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<IntegrationTemplateConnection>
	 */
	function integrationTemplates(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('integrationTemplates', IntegrationTemplateConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<IntegrationTemplate>
	 */
	function integrationTemplate(string $id)
	{
		return $this->linearObjectQuery('integrationTemplate', IntegrationTemplate::class, compact('id'));
	}
	
	/**
	 * @param string $code OAuth code.
	 * @returns PendingLinearObjectRequest<GithubOAuthTokenPayload>
	 */
	function issueImportFinishGithubOAuth(string $code)
	{
		return $this->linearObjectQuery('issueImportFinishGithubOAuth', GithubOAuthTokenPayload::class, compact('code'));
	}
	
	/**
	 * @param string $csvUrl CSV storage url.
	 * @param string $service The service the CSV containing data from.
	 * @returns PendingLinearObjectRequest<IssueImportCheckPayload>
	 */
	function issueImportCheckCSV(string $csvUrl, string $service)
	{
		return $this->linearObjectQuery('issueImportCheckCSV', IssueImportCheckPayload::class, compact('csvUrl', 'service'));
	}
	
	/**
	 * @param ?IssueLabelFilter $filter Filter returned issue labels.
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<IssueLabelConnection>
	 */
	function issueLabels(
		?IssueLabelFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearObjectQuery('issueLabels', IssueLabelConnection::class, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<IssueLabel>
	 */
	function issueLabel(string $id)
	{
		return $this->linearObjectQuery('issueLabel', IssueLabel::class, compact('id'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<IssueRelationConnection>
	 */
	function issueRelations(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('issueRelations', IssueRelationConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<IssueRelation>
	 */
	function issueRelation(string $id)
	{
		return $this->linearObjectQuery('issueRelation', IssueRelation::class, compact('id'));
	}
	
	/**
	 * @param ?IssueFilter $filter Filter returned issues.
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param ?iterable $sort [INTERNAL] Sort returned issues.
	 * @returns PendingLinearObjectRequest<IssueConnection>
	 */
	function issues(
		?IssueFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null,
		?iterable $sort = null
	) {
		return $this->linearObjectQuery('issues', IssueConnection::class, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy', 'sort'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<Issue>
	 */
	function issue(string $id)
	{
		return $this->linearObjectQuery('issue', Issue::class, compact('id'));
	}
	
	/**
	 * @param ?IssueFilter $filter Filter returned issues.
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param ?string $query [Deprecated] Search string to look for.
	 * @returns PendingLinearObjectRequest<IssueConnection>
	 */
	function issueSearch(
		?IssueFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null,
		?string $query = null
	) {
		return $this->linearObjectQuery('issueSearch', IssueConnection::class, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy', 'query'));
	}
	
	/**
	 * @param string $branchName The VCS branch name to search for.
	 * @returns PendingLinearObjectRequest<Issue>
	 */
	function issueVcsBranchSearch(string $branchName)
	{
		return $this->linearObjectQuery('issueVcsBranchSearch', Issue::class, compact('branchName'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param string $fileKey The Figma file key.
	 * @returns PendingLinearObjectRequest<IssueConnection>
	 */
	function issueFigmaFileKeySearch(
		string $fileKey,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearObjectQuery('issueFigmaFileKeySearch', IssueConnection::class, compact('fileKey', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @returns PendingLinearListRequest<IssuePriorityValue>
	 */
	function issuePriorityValues()
	{
		return $this->linearListQuery('issuePriorityValues', IssuePriorityValue::class);
	}
	
	/**
	 * @param ?string $projectId The ID of the project if filtering a project view
	 * @param string $prompt
	 * @returns PendingLinearObjectRequest<IssueFilterSuggestionPayload>
	 */
	function issueFilterSuggestion(string $prompt, ?string $projectId = null)
	{
		return $this->linearObjectQuery('issueFilterSuggestion', IssueFilterSuggestionPayload::class, compact('prompt', 'projectId'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<NotificationConnection>
	 */
	function notifications(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('notifications', NotificationConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<Notification>
	 */
	function notification(string $id)
	{
		return $this->linearObjectQuery('notification', Notification::class, compact('id'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<NotificationSubscriptionConnection>
	 */
	function notificationSubscriptions(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('notificationSubscriptions', NotificationSubscriptionConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<NotificationSubscription>
	 */
	function notificationSubscription(string $id)
	{
		return $this->linearObjectQuery('notificationSubscription', NotificationSubscription::class, compact('id'));
	}
	
	/**
	 * @param string $id The ID of the organization domain to claim.
	 * @returns PendingLinearObjectRequest<OrganizationDomainClaimPayload>
	 */
	function organizationDomainClaimRequest(string $id)
	{
		return $this->linearObjectQuery('organizationDomainClaimRequest', OrganizationDomainClaimPayload::class, compact('id'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<OrganizationInviteConnection>
	 */
	function organizationInvites(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('organizationInvites', OrganizationInviteConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<OrganizationInvite>
	 */
	function organizationInvite(string $id)
	{
		return $this->linearObjectQuery('organizationInvite', OrganizationInvite::class, compact('id'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<OrganizationInviteDetailsPayload>
	 */
	function organizationInviteDetails(string $id)
	{
		return $this->linearObjectQuery('organizationInviteDetails', OrganizationInviteDetailsPayload::class, compact('id'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<Organization>
	 */
	function organization()
	{
		return $this->linearObjectQuery('organization', Organization::class);
	}
	
	/**
	 * @param string $urlKey
	 * @returns PendingLinearObjectRequest<OrganizationExistsPayload>
	 */
	function organizationExists(string $urlKey)
	{
		return $this->linearObjectQuery('organizationExists', OrganizationExistsPayload::class, compact('urlKey'));
	}
	
	/**
	 * @returns PendingLinearListRequest<Team>
	 */
	function archivedTeams()
	{
		return $this->linearListQuery('archivedTeams', Team::class);
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<ProjectLinkConnection>
	 */
	function projectLinks(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('projectLinks', ProjectLinkConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<ProjectLink>
	 */
	function projectLink(string $id)
	{
		return $this->linearObjectQuery('projectLink', ProjectLink::class, compact('id'));
	}
	
	/**
	 * @param ?ProjectMilestoneFilter $filter Filter returned project milestones.
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<ProjectMilestoneConnection>
	 */
	function projectMilestones(
		?ProjectMilestoneFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearObjectQuery('projectMilestones', ProjectMilestoneConnection::class, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<ProjectMilestone>
	 */
	function projectMilestone(string $id)
	{
		return $this->linearObjectQuery('projectMilestone', ProjectMilestone::class, compact('id'));
	}
	
	/**
	 * @param ?ProjectFilter $filter Filter returned projects.
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<ProjectConnection>
	 */
	function projects(
		?ProjectFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearObjectQuery('projects', ProjectConnection::class, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<Project>
	 */
	function project(string $id)
	{
		return $this->linearObjectQuery('project', Project::class, compact('id'));
	}
	
	/**
	 * @param string $prompt
	 * @returns PendingLinearObjectRequest<ProjectFilterSuggestionPayload>
	 */
	function projectFilterSuggestion(string $prompt)
	{
		return $this->linearObjectQuery('projectFilterSuggestion', ProjectFilterSuggestionPayload::class, compact('prompt'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<ProjectUpdateInteractionConnection>
	 */
	function projectUpdateInteractions(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('projectUpdateInteractions', ProjectUpdateInteractionConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id The identifier of the project update interaction to retrieve.
	 * @returns PendingLinearObjectRequest<ProjectUpdateInteraction>
	 */
	function projectUpdateInteraction(string $id)
	{
		return $this->linearObjectQuery('projectUpdateInteraction', ProjectUpdateInteraction::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the project update to retrieve.
	 * @returns PendingLinearObjectRequest<ProjectUpdate>
	 */
	function projectUpdate(string $id)
	{
		return $this->linearObjectQuery('projectUpdate', ProjectUpdate::class, compact('id'));
	}
	
	/**
	 * @param ?bool $targetMobile Whether to send to mobile devices.
	 * @param ?SendStrategy $sendStrategy The send strategy to use.
	 * @returns PendingLinearObjectRequest<PushSubscriptionTestPayload>
	 */
	function pushSubscriptionTest(?bool $targetMobile = null, ?SendStrategy $sendStrategy = null)
	{
		return $this->linearObjectQuery('pushSubscriptionTest', PushSubscriptionTestPayload::class, compact('targetMobile', 'sendStrategy'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<RateLimitPayload>
	 */
	function rateLimitStatus()
	{
		return $this->linearObjectQuery('rateLimitStatus', RateLimitPayload::class);
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<RoadmapConnection>
	 */
	function roadmaps(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('roadmaps', RoadmapConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<Roadmap>
	 */
	function roadmap(string $id)
	{
		return $this->linearObjectQuery('roadmap', Roadmap::class, compact('id'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<RoadmapToProjectConnection>
	 */
	function roadmapToProjects(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('roadmapToProjects', RoadmapToProjectConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<RoadmapToProject>
	 */
	function roadmapToProject(string $id)
	{
		return $this->linearObjectQuery('roadmapToProject', RoadmapToProject::class, compact('id'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param string $term Search string to look for.
	 * @param ?float $snippetSize Size of search snippet to return (default: 100)
	 * @param ?bool $includeComments Should associated comments be searched (default: true).
	 * @param ?string $teamId UUID of a team to use as a boost.
	 * @returns PendingLinearObjectRequest<DocumentSearchPayload>
	 */
	function searchDocuments(
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
	) {
		return $this->linearObjectQuery('searchDocuments', DocumentSearchPayload::class, compact('term', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy', 'snippetSize', 'includeComments', 'teamId'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param string $term Search string to look for.
	 * @param ?float $snippetSize Size of search snippet to return (default: 100)
	 * @param ?bool $includeComments Should associated comments be searched (default: true).
	 * @param ?string $teamId UUID of a team to use as a boost.
	 * @returns PendingLinearObjectRequest<ProjectSearchPayload>
	 */
	function searchProjects(
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
	) {
		return $this->linearObjectQuery('searchProjects', ProjectSearchPayload::class, compact('term', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy', 'snippetSize', 'includeComments', 'teamId'));
	}
	
	/**
	 * @param ?IssueFilter $filter Filter returned issues.
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param string $term Search string to look for.
	 * @param ?float $snippetSize Size of search snippet to return (default: 100)
	 * @param ?bool $includeComments Should associated comments be searched (default: true).
	 * @param ?string $teamId UUID of a team to use as a boost.
	 * @returns PendingLinearObjectRequest<IssueSearchPayload>
	 */
	function searchIssues(
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
	) {
		return $this->linearObjectQuery('searchIssues', IssueSearchPayload::class, compact('term', 'filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy', 'snippetSize', 'includeComments', 'teamId'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<TeamMembershipConnection>
	 */
	function teamMemberships(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('teamMemberships', TeamMembershipConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<TeamMembership>
	 */
	function teamMembership(string $id)
	{
		return $this->linearObjectQuery('teamMembership', TeamMembership::class, compact('id'));
	}
	
	/**
	 * @param ?TeamFilter $filter Filter returned teams.
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<TeamConnection>
	 */
	function teams(?TeamFilter $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('teams', TeamConnection::class, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param ?TeamFilter $filter Filter returned teams.
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<TeamConnection>
	 */
	function administrableTeams(
		?TeamFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearObjectQuery('administrableTeams', TeamConnection::class, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<Team>
	 */
	function team(string $id)
	{
		return $this->linearObjectQuery('team', Team::class, compact('id'));
	}
	
	/**
	 * @returns PendingLinearListRequest<Template>
	 */
	function templates()
	{
		return $this->linearListQuery('templates', Template::class);
	}
	
	/**
	 * @param string $id The identifier of the template to retrieve.
	 * @returns PendingLinearObjectRequest<Template>
	 */
	function template(string $id)
	{
		return $this->linearObjectQuery('template', Template::class, compact('id'));
	}
	
	/**
	 * @param string $integrationType The type of integration for which to return associated templates.
	 * @returns PendingLinearListRequest<Template>
	 */
	function templatesForIntegration(string $integrationType)
	{
		return $this->linearListQuery('templatesForIntegration', Template::class, compact('integrationType'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<TimeScheduleConnection>
	 */
	function timeSchedules(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('timeSchedules', TimeScheduleConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id The identifier of the time schedule to retrieve.
	 * @returns PendingLinearObjectRequest<TimeSchedule>
	 */
	function timeSchedule(string $id)
	{
		return $this->linearObjectQuery('timeSchedule', TimeSchedule::class, compact('id'));
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<TriageResponsibilityConnection>
	 */
	function triageResponsibilities(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('triageResponsibilities', TriageResponsibilityConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id The identifier of the triage responsibility to retrieve.
	 * @returns PendingLinearObjectRequest<TriageResponsibility>
	 */
	function triageResponsibility(string $id)
	{
		return $this->linearObjectQuery('triageResponsibility', TriageResponsibility::class, compact('id'));
	}
	
	/**
	 * @param ?UserFilter $filter Filter returned users.
	 * @param ?bool $includeDisabled Should query return disabled/suspended users (default: false).
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<UserConnection>
	 */
	function users(
		?UserFilter $filter = null,
		?bool $includeDisabled = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearObjectQuery('users', UserConnection::class, compact('filter', 'includeDisabled', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id The identifier of the user to retrieve. To retrieve the authenticated user, use `viewer` query.
	 * @returns PendingLinearObjectRequest<User>
	 */
	function user(string $id)
	{
		return $this->linearObjectQuery('user', User::class, compact('id'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<User>
	 */
	function viewer()
	{
		return $this->linearObjectQuery('viewer', User::class);
	}
	
	/**
	 * @returns PendingLinearObjectRequest<UserSettings>
	 */
	function userSettings()
	{
		return $this->linearObjectQuery('userSettings', UserSettings::class);
	}
	
	/**
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<WebhookConnection>
	 */
	function webhooks(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearObjectQuery('webhooks', WebhookConnection::class, compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id The identifier of the webhook to retrieve.
	 * @returns PendingLinearObjectRequest<Webhook>
	 */
	function webhook(string $id)
	{
		return $this->linearObjectQuery('webhook', Webhook::class, compact('id'));
	}
	
	/**
	 * @param ?WorkflowStateFilter $filter Filter returned workflow states.
	 * @param ?string $before A cursor to be used with last for backward pagination.
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @returns PendingLinearObjectRequest<WorkflowStateConnection>
	 */
	function workflowStates(
		?WorkflowStateFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearObjectQuery('workflowStates', WorkflowStateConnection::class, compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 * @returns PendingLinearObjectRequest<WorkflowState>
	 */
	function workflowState(string $id)
	{
		return $this->linearObjectQuery('workflowState', WorkflowState::class, compact('id'));
	}
}
