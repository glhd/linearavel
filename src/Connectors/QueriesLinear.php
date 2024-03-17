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

trait QueriesLinear
{
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function apiKeys(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('apiKeys', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $clientId the client ID of the application
	 */
	public function applicationInfo(string $clientId)
	{
		return $this->linearQuery('applicationInfo', compact('clientId'));
	}
	
	/**
	 * @param iterable $ids the IDs of the applications
	 */
	public function applicationInfoByIds(iterable $ids)
	{
		return $this->linearQuery('applicationInfoByIds', compact('ids'));
	}
	
	/**
	 * @param iterable $clientIds the client IDs to look up
	 */
	public function applicationInfoWithMembershipsByIds(iterable $clientIds)
	{
		return $this->linearQuery('applicationInfoWithMembershipsByIds', compact('clientIds'));
	}
	
	/**
	 * @param ?string $actor actor mode used for the authorization
	 * @param ?string $redirectUri redirect URI for the application
	 * @param iterable $scope scopes being requested by the application
	 * @param string $clientId the client ID of the application
	 */
	public function applicationWithAuthorization(iterable $scope, string $clientId, ?string $actor = null, ?string $redirectUri = null)
	{
		return $this->linearQuery('applicationWithAuthorization', compact('scope', 'clientId', 'actor', 'redirectUri'));
	}
	
	public function authorizedApplications()
	{
		return $this->linearQuery('authorizedApplications', compact());
	}
	
	public function workspaceAuthorizedApplications()
	{
		return $this->linearQuery('workspaceAuthorizedApplications', compact());
	}
	
	/**
	 * @param ?AttachmentFilter $filter filter returned attachments
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function attachments(
		?AttachmentFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearQuery('attachments', compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function attachment(string $id)
	{
		return $this->linearQuery('attachment', compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param string $url the attachment URL
	 */
	public function attachmentsForURL(string $url, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('attachmentsForURL', compact('url', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id `id` of the attachment for which you'll want to get the issue for. [Deprecated] `url` as the `id` parameter.
	 */
	public function attachmentIssue(string $id)
	{
		return $this->linearQuery('attachmentIssue', compact('id'));
	}
	
	/**
	 * @param ?string $teamId (optional) if provided will only return attachment sources for the given team
	 */
	public function attachmentSources(?string $teamId = null)
	{
		return $this->linearQuery('attachmentSources', compact('teamId'));
	}
	
	public function auditEntryTypes()
	{
		return $this->linearQuery('auditEntryTypes', compact());
	}
	
	/**
	 * @param ?AuditEntryFilter $filter filter returned audit entries
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function auditEntries(
		?AuditEntryFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearQuery('auditEntries', compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	public function availableUsers()
	{
		return $this->linearQuery('availableUsers', compact());
	}
	
	public function authenticationSessions()
	{
		return $this->linearQuery('authenticationSessions', compact());
	}
	
	/**
	 * @param ?bool $isDesktop whether the client is the desktop app
	 * @param string $email email to query the SSO login URL by
	 */
	public function ssoUrlFromEmail(string $email, ?bool $isDesktop = null)
	{
		return $this->linearQuery('ssoUrlFromEmail', compact('email', 'isDesktop'));
	}
	
	/**
	 * @param ?CommentFilter $filter filter returned comments
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function comments(
		?CommentFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearQuery('comments', compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param ?string $id the identifier of the comment to retrieve
	 * @param ?string $issueId [Deprecated] The issue for which to find the comment
	 * @param ?string $hash the hash of the comment to retrieve
	 */
	public function comment(?string $id = null, ?string $issueId = null, ?string $hash = null)
	{
		return $this->linearQuery('comment', compact('id', 'issueId', 'hash'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function customViews(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('customViews', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function customView(string $id)
	{
		return $this->linearQuery('customView', compact('id'));
	}
	
	/**
	 * @param ?string $modelName
	 * @param string $filter
	 */
	public function customViewDetailsSuggestion(string $filter, ?string $modelName = null)
	{
		return $this->linearQuery('customViewDetailsSuggestion', compact('filter', 'modelName'));
	}
	
	/**
	 * @param string $id the identifier of the custom view
	 */
	public function customViewHasSubscribers(string $id)
	{
		return $this->linearQuery('customViewHasSubscribers', compact('id'));
	}
	
	/**
	 * @param ?CycleFilter $filter filter returned users
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function cycles(
		?CycleFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearQuery('cycles', compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function cycle(string $id)
	{
		return $this->linearQuery('cycle', compact('id'));
	}
	
	/**
	 * @param string $id
	 */
	public function documentContentHistory(string $id)
	{
		return $this->linearQuery('documentContentHistory', compact('id'));
	}
	
	/**
	 * @param ?DocumentFilter $filter filter returned documents
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function documents(
		?DocumentFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearQuery('documents', compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function document(string $id)
	{
		return $this->linearQuery('document', compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function emojis(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('emojis', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id the identifier or the name of the emoji to retrieve
	 */
	public function emoji(string $id)
	{
		return $this->linearQuery('emoji', compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function externalUsers(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('externalUsers', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id the identifier of the external user to retrieve
	 */
	public function externalUser(string $id)
	{
		return $this->linearQuery('externalUser', compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function initiativeToProjects(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('initiativeToProjects', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function initiativeToProject(string $id)
	{
		return $this->linearQuery('initiativeToProject', compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function initiatives(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('initiatives', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function initiative(string $id)
	{
		return $this->linearQuery('initiative', compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function favorites(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('favorites', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function favorite(string $id)
	{
		return $this->linearQuery('favorite', compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function integrations(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('integrations', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function integration(string $id)
	{
		return $this->linearQuery('integration', compact('id'));
	}
	
	/**
	 * @param iterable $scopes required scopes
	 * @param string $integrationId the integration ID
	 */
	public function integrationHasScopes(iterable $scopes, string $integrationId)
	{
		return $this->linearQuery('integrationHasScopes', compact('scopes', 'integrationId'));
	}
	
	/**
	 * @param ?ProjectUpdateFilter $filter filter returned project updates
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function projectUpdates(
		?ProjectUpdateFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearQuery('projectUpdates', compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function integrationsSettings(string $id)
	{
		return $this->linearQuery('integrationsSettings', compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function integrationTemplates(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('integrationTemplates', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function integrationTemplate(string $id)
	{
		return $this->linearQuery('integrationTemplate', compact('id'));
	}
	
	/**
	 * @param string $code OAuth code
	 */
	public function issueImportFinishGithubOAuth(string $code)
	{
		return $this->linearQuery('issueImportFinishGithubOAuth', compact('code'));
	}
	
	/**
	 * @param string $csvUrl CSV storage url
	 * @param string $service the service the CSV containing data from
	 */
	public function issueImportCheckCSV(string $csvUrl, string $service)
	{
		return $this->linearQuery('issueImportCheckCSV', compact('csvUrl', 'service'));
	}
	
	/**
	 * @param ?IssueLabelFilter $filter filter returned issue labels
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function issueLabels(
		?IssueLabelFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearQuery('issueLabels', compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function issueLabel(string $id)
	{
		return $this->linearQuery('issueLabel', compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function issueRelations(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('issueRelations', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function issueRelation(string $id)
	{
		return $this->linearQuery('issueRelation', compact('id'));
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
	) {
		return $this->linearQuery('issues', compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy', 'sort'));
	}
	
	/**
	 * @param string $id
	 */
	public function issue(string $id)
	{
		return $this->linearQuery('issue', compact('id'));
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
	) {
		return $this->linearQuery('issueSearch', compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy', 'query'));
	}
	
	/**
	 * @param string $branchName the VCS branch name to search for
	 */
	public function issueVcsBranchSearch(string $branchName)
	{
		return $this->linearQuery('issueVcsBranchSearch', compact('branchName'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 * @param string $fileKey the Figma file key
	 */
	public function issueFigmaFileKeySearch(
		string $fileKey,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearQuery('issueFigmaFileKeySearch', compact('fileKey', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	public function issuePriorityValues()
	{
		return $this->linearQuery('issuePriorityValues', compact());
	}
	
	/**
	 * @param ?string $projectId The ID of the project if filtering a project view
	 * @param string $prompt
	 */
	public function issueFilterSuggestion(string $prompt, ?string $projectId = null)
	{
		return $this->linearQuery('issueFilterSuggestion', compact('prompt', 'projectId'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function notifications(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('notifications', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function notification(string $id)
	{
		return $this->linearQuery('notification', compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function notificationSubscriptions(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('notificationSubscriptions', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function notificationSubscription(string $id)
	{
		return $this->linearQuery('notificationSubscription', compact('id'));
	}
	
	/**
	 * @param string $id the ID of the organization domain to claim
	 */
	public function organizationDomainClaimRequest(string $id)
	{
		return $this->linearQuery('organizationDomainClaimRequest', compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function organizationInvites(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('organizationInvites', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function organizationInvite(string $id)
	{
		return $this->linearQuery('organizationInvite', compact('id'));
	}
	
	/**
	 * @param string $id
	 */
	public function organizationInviteDetails(string $id)
	{
		return $this->linearQuery('organizationInviteDetails', compact('id'));
	}
	
	public function organization()
	{
		return $this->linearQuery('organization', compact());
	}
	
	/**
	 * @param string $urlKey
	 */
	public function organizationExists(string $urlKey)
	{
		return $this->linearQuery('organizationExists', compact('urlKey'));
	}
	
	public function archivedTeams()
	{
		return $this->linearQuery('archivedTeams', compact());
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function projectLinks(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('projectLinks', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function projectLink(string $id)
	{
		return $this->linearQuery('projectLink', compact('id'));
	}
	
	/**
	 * @param ?ProjectMilestoneFilter $filter filter returned project milestones
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function projectMilestones(
		?ProjectMilestoneFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearQuery('projectMilestones', compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function projectMilestone(string $id)
	{
		return $this->linearQuery('projectMilestone', compact('id'));
	}
	
	/**
	 * @param ?ProjectFilter $filter filter returned projects
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function projects(
		?ProjectFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearQuery('projects', compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function project(string $id)
	{
		return $this->linearQuery('project', compact('id'));
	}
	
	/**
	 * @param string $prompt
	 */
	public function projectFilterSuggestion(string $prompt)
	{
		return $this->linearQuery('projectFilterSuggestion', compact('prompt'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function projectUpdateInteractions(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('projectUpdateInteractions', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id the identifier of the project update interaction to retrieve
	 */
	public function projectUpdateInteraction(string $id)
	{
		return $this->linearQuery('projectUpdateInteraction', compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the project update to retrieve
	 */
	public function projectUpdate(string $id)
	{
		return $this->linearQuery('projectUpdate', compact('id'));
	}
	
	/**
	 * @param ?bool $targetMobile whether to send to mobile devices
	 * @param ?SendStrategy $sendStrategy the send strategy to use
	 */
	public function pushSubscriptionTest(?bool $targetMobile = null, ?SendStrategy $sendStrategy = null)
	{
		return $this->linearQuery('pushSubscriptionTest', compact('targetMobile', 'sendStrategy'));
	}
	
	public function rateLimitStatus()
	{
		return $this->linearQuery('rateLimitStatus', compact());
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function roadmaps(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('roadmaps', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function roadmap(string $id)
	{
		return $this->linearQuery('roadmap', compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function roadmapToProjects(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('roadmapToProjects', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function roadmapToProject(string $id)
	{
		return $this->linearQuery('roadmapToProject', compact('id'));
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
	) {
		return $this->linearQuery('searchDocuments', compact('term', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy', 'snippetSize', 'includeComments', 'teamId'));
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
	) {
		return $this->linearQuery('searchProjects', compact('term', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy', 'snippetSize', 'includeComments', 'teamId'));
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
	) {
		return $this->linearQuery('searchIssues', compact('term', 'filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy', 'snippetSize', 'includeComments', 'teamId'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function teamMemberships(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('teamMemberships', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function teamMembership(string $id)
	{
		return $this->linearQuery('teamMembership', compact('id'));
	}
	
	/**
	 * @param ?TeamFilter $filter filter returned teams
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function teams(?TeamFilter $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('teams', compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param ?TeamFilter $filter filter returned teams
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function administrableTeams(
		?TeamFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearQuery('administrableTeams', compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function team(string $id)
	{
		return $this->linearQuery('team', compact('id'));
	}
	
	public function templates()
	{
		return $this->linearQuery('templates', compact());
	}
	
	/**
	 * @param string $id the identifier of the template to retrieve
	 */
	public function template(string $id)
	{
		return $this->linearQuery('template', compact('id'));
	}
	
	/**
	 * @param string $integrationType the type of integration for which to return associated templates
	 */
	public function templatesForIntegration(string $integrationType)
	{
		return $this->linearQuery('templatesForIntegration', compact('integrationType'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function timeSchedules(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('timeSchedules', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id the identifier of the time schedule to retrieve
	 */
	public function timeSchedule(string $id)
	{
		return $this->linearQuery('timeSchedule', compact('id'));
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function triageResponsibilities(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('triageResponsibilities', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id the identifier of the triage responsibility to retrieve
	 */
	public function triageResponsibility(string $id)
	{
		return $this->linearQuery('triageResponsibility', compact('id'));
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
	) {
		return $this->linearQuery('users', compact('filter', 'includeDisabled', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id The identifier of the user to retrieve. To retrieve the authenticated user, use `viewer` query.
	 */
	public function user(string $id)
	{
		return $this->linearQuery('user', compact('id'));
	}
	
	public function viewer()
	{
		return $this->linearQuery('viewer', compact());
	}
	
	public function userSettings()
	{
		return $this->linearQuery('userSettings', compact());
	}
	
	/**
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function webhooks(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
	{
		return $this->linearQuery('webhooks', compact('before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id the identifier of the webhook to retrieve
	 */
	public function webhook(string $id)
	{
		return $this->linearQuery('webhook', compact('id'));
	}
	
	/**
	 * @param ?WorkflowStateFilter $filter filter returned workflow states
	 * @param ?string $before a cursor to be used with last for backward pagination
	 * @param ?string $after A cursor to be used with first for forward pagination
	 * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
	 * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
	 * @param ?bool $includeArchived Should archived resources be included (default: false)
	 * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
	 */
	public function workflowStates(
		?WorkflowStateFilter $filter = null,
		?string $before = null,
		?string $after = null,
		?int $first = null,
		?int $last = null,
		?bool $includeArchived = null,
		?PaginationOrderBy $orderBy = null
	) {
		return $this->linearQuery('workflowStates', compact('filter', 'before', 'after', 'first', 'last', 'includeArchived', 'orderBy'));
	}
	
	/**
	 * @param string $id
	 */
	public function workflowState(string $id)
	{
		return $this->linearQuery('workflowState', compact('id'));
	}
}
