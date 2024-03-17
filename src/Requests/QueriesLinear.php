<?php

namespace Glhd\Linearavel\Requests;

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
	}
	
	/**
	 * @param string $clientId the client ID of the application
	 */
	public function applicationInfo(string $clientId)
	{
	}
	
	/**
	 * @param iterable $ids the IDs of the applications
	 */
	public function applicationInfoByIds(iterable $ids)
	{
	}
	
	/**
	 * @param iterable $clientIds the client IDs to look up
	 */
	public function applicationInfoWithMembershipsByIds(iterable $clientIds)
	{
	}
	
	/**
	 * @param ?string $actor actor mode used for the authorization
	 * @param ?string $redirectUri redirect URI for the application
	 * @param iterable $scope scopes being requested by the application
	 * @param string $clientId the client ID of the application
	 */
	public function applicationWithAuthorization(iterable $scope, string $clientId, ?string $actor = null, ?string $redirectUri = null)
	{
	}
	
	public function authorizedApplications()
	{
	}
	
	public function workspaceAuthorizedApplications()
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function attachment(string $id)
	{
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
	}
	
	/**
	 * @param string $id `id` of the attachment for which you'll want to get the issue for. [Deprecated] `url` as the `id` parameter.
	 */
	public function attachmentIssue(string $id)
	{
	}
	
	/**
	 * @param ?string $teamId (optional) if provided will only return attachment sources for the given team
	 */
	public function attachmentSources(?string $teamId = null)
	{
	}
	
	public function auditEntryTypes()
	{
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
	}
	
	public function availableUsers()
	{
	}
	
	public function authenticationSessions()
	{
	}
	
	/**
	 * @param ?bool $isDesktop whether the client is the desktop app
	 * @param string $email email to query the SSO login URL by
	 */
	public function ssoUrlFromEmail(string $email, ?bool $isDesktop = null)
	{
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
	}
	
	/**
	 * @param ?string $id the identifier of the comment to retrieve
	 * @param ?string $issueId [Deprecated] The issue for which to find the comment
	 * @param ?string $hash the hash of the comment to retrieve
	 */
	public function comment(?string $id = null, ?string $issueId = null, ?string $hash = null)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function customView(string $id)
	{
	}
	
	/**
	 * @param ?string $modelName
	 * @param string $filter
	 */
	public function customViewDetailsSuggestion(string $filter, ?string $modelName = null)
	{
	}
	
	/**
	 * @param string $id the identifier of the custom view
	 */
	public function customViewHasSubscribers(string $id)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function cycle(string $id)
	{
	}
	
	/**
	 * @param string $id
	 */
	public function documentContentHistory(string $id)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function document(string $id)
	{
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
	}
	
	/**
	 * @param string $id the identifier or the name of the emoji to retrieve
	 */
	public function emoji(string $id)
	{
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
	}
	
	/**
	 * @param string $id the identifier of the external user to retrieve
	 */
	public function externalUser(string $id)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function initiativeToProject(string $id)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function initiative(string $id)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function favorite(string $id)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function integration(string $id)
	{
	}
	
	/**
	 * @param iterable $scopes required scopes
	 * @param string $integrationId the integration ID
	 */
	public function integrationHasScopes(iterable $scopes, string $integrationId)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function integrationsSettings(string $id)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function integrationTemplate(string $id)
	{
	}
	
	/**
	 * @param string $code OAuth code
	 */
	public function issueImportFinishGithubOAuth(string $code)
	{
	}
	
	/**
	 * @param string $csvUrl CSV storage url
	 * @param string $service the service the CSV containing data from
	 */
	public function issueImportCheckCSV(string $csvUrl, string $service)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function issueLabel(string $id)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function issueRelation(string $id)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function issue(string $id)
	{
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
	}
	
	/**
	 * @param string $branchName the VCS branch name to search for
	 */
	public function issueVcsBranchSearch(string $branchName)
	{
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
	}
	
	public function issuePriorityValues()
	{
	}
	
	/**
	 * @param ?string $projectId The ID of the project if filtering a project view
	 * @param string $prompt
	 */
	public function issueFilterSuggestion(string $prompt, ?string $projectId = null)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function notification(string $id)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function notificationSubscription(string $id)
	{
	}
	
	/**
	 * @param string $id the ID of the organization domain to claim
	 */
	public function organizationDomainClaimRequest(string $id)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function organizationInvite(string $id)
	{
	}
	
	/**
	 * @param string $id
	 */
	public function organizationInviteDetails(string $id)
	{
	}
	
	public function organization()
	{
	}
	
	/**
	 * @param string $urlKey
	 */
	public function organizationExists(string $urlKey)
	{
	}
	
	public function archivedTeams()
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function projectLink(string $id)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function projectMilestone(string $id)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function project(string $id)
	{
	}
	
	/**
	 * @param string $prompt
	 */
	public function projectFilterSuggestion(string $prompt)
	{
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
	}
	
	/**
	 * @param string $id the identifier of the project update interaction to retrieve
	 */
	public function projectUpdateInteraction(string $id)
	{
	}
	
	/**
	 * @param string $id the identifier of the project update to retrieve
	 */
	public function projectUpdate(string $id)
	{
	}
	
	/**
	 * @param ?bool $targetMobile whether to send to mobile devices
	 * @param ?SendStrategy $sendStrategy the send strategy to use
	 */
	public function pushSubscriptionTest(?bool $targetMobile = null, ?SendStrategy $sendStrategy = null)
	{
	}
	
	public function rateLimitStatus()
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function roadmap(string $id)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function roadmapToProject(string $id)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function teamMembership(string $id)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function team(string $id)
	{
	}
	
	public function templates()
	{
	}
	
	/**
	 * @param string $id the identifier of the template to retrieve
	 */
	public function template(string $id)
	{
	}
	
	/**
	 * @param string $integrationType the type of integration for which to return associated templates
	 */
	public function templatesForIntegration(string $integrationType)
	{
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
	}
	
	/**
	 * @param string $id the identifier of the time schedule to retrieve
	 */
	public function timeSchedule(string $id)
	{
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
	}
	
	/**
	 * @param string $id the identifier of the triage responsibility to retrieve
	 */
	public function triageResponsibility(string $id)
	{
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
	}
	
	/**
	 * @param string $id The identifier of the user to retrieve. To retrieve the authenticated user, use `viewer` query.
	 */
	public function user(string $id)
	{
	}
	
	public function viewer()
	{
	}
	
	public function userSettings()
	{
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
	}
	
	/**
	 * @param string $id the identifier of the webhook to retrieve
	 */
	public function webhook(string $id)
	{
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
	}
	
	/**
	 * @param string $id
	 */
	public function workflowState(string $id)
	{
	}
}
