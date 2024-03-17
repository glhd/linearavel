<?php

namespace Glhd\Linearavel\Requests;

use Glhd\Linearavel\Data\Enums\PaginationOrderBy, Glhd\Linearavel\Requests\Inputs\AttachmentFilter, Glhd\Linearavel\Requests\Inputs\AuditEntryFilter, Glhd\Linearavel\Requests\Inputs\CommentFilter, Glhd\Linearavel\Requests\Inputs\CycleFilter, Glhd\Linearavel\Requests\Inputs\DocumentFilter, Glhd\Linearavel\Requests\Inputs\ProjectUpdateFilter, Glhd\Linearavel\Requests\Inputs\IssueLabelFilter, Glhd\Linearavel\Requests\Inputs\IssueFilter, Glhd\Linearavel\Requests\Inputs\ProjectMilestoneFilter, Glhd\Linearavel\Requests\Inputs\ProjectFilter, Glhd\Linearavel\Data\Enums\SendStrategy, Glhd\Linearavel\Requests\Inputs\TeamFilter, Glhd\Linearavel\Requests\Inputs\UserFilter, Glhd\Linearavel\Requests\Inputs\WorkflowStateFilter;
trait QueriesLinear
{
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function apiKeys(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $clientId The client ID of the application.
     */
    function applicationInfo(string $clientId)
    {
    }
    /**
     * @param iterable $ids The IDs of the applications.
     */
    function applicationInfoByIds(iterable $ids)
    {
    }
    /**
     * @param iterable $clientIds The client IDs to look up.
     */
    function applicationInfoWithMembershipsByIds(iterable $clientIds)
    {
    }
    /**
     * @param ?string $actor Actor mode used for the authorization.
     * @param ?string $redirectUri Redirect URI for the application.
     * @param iterable $scope Scopes being requested by the application.
     * @param string $clientId The client ID of the application.
     */
    function applicationWithAuthorization(iterable $scope, string $clientId, ?string $actor = null, ?string $redirectUri = null)
    {
    }
    function authorizedApplications()
    {
    }
    function workspaceAuthorizedApplications()
    {
    }
    /**
     * @param ?AttachmentFilter $filter Filter returned attachments.
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function attachments(?AttachmentFilter $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function attachment(string $id)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     * @param string $url The attachment URL.
     */
    function attachmentsForURL(string $url, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id `id` of the attachment for which you'll want to get the issue for. [Deprecated] `url` as the `id` parameter.
     */
    function attachmentIssue(string $id)
    {
    }
    /**
     * @param ?string $teamId (optional) if provided will only return attachment sources for the given team.
     */
    function attachmentSources(?string $teamId = null)
    {
    }
    function auditEntryTypes()
    {
    }
    /**
     * @param ?AuditEntryFilter $filter Filter returned audit entries.
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function auditEntries(?AuditEntryFilter $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    function availableUsers()
    {
    }
    function authenticationSessions()
    {
    }
    /**
     * @param ?bool $isDesktop Whether the client is the desktop app.
     * @param string $email Email to query the SSO login URL by.
     */
    function ssoUrlFromEmail(string $email, ?bool $isDesktop = null)
    {
    }
    /**
     * @param ?CommentFilter $filter Filter returned comments.
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function comments(?CommentFilter $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param ?string $id The identifier of the comment to retrieve.
     * @param ?string $issueId [Deprecated] The issue for which to find the comment.
     * @param ?string $hash The hash of the comment to retrieve.
     */
    function comment(?string $id = null, ?string $issueId = null, ?string $hash = null)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function customViews(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function customView(string $id)
    {
    }
    /**
     * @param ?string $modelName
     * @param string $filter
     */
    function customViewDetailsSuggestion(string $filter, ?string $modelName = null)
    {
    }
    /**
     * @param string $id The identifier of the custom view.
     */
    function customViewHasSubscribers(string $id)
    {
    }
    /**
     * @param ?CycleFilter $filter Filter returned users.
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function cycles(?CycleFilter $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function cycle(string $id)
    {
    }
    /**
     * @param string $id
     */
    function documentContentHistory(string $id)
    {
    }
    /**
     * @param ?DocumentFilter $filter Filter returned documents.
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function documents(?DocumentFilter $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function document(string $id)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function emojis(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id The identifier or the name of the emoji to retrieve.
     */
    function emoji(string $id)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function externalUsers(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id The identifier of the external user to retrieve.
     */
    function externalUser(string $id)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function initiativeToProjects(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function initiativeToProject(string $id)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function initiatives(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function initiative(string $id)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function favorites(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function favorite(string $id)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function integrations(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function integration(string $id)
    {
    }
    /**
     * @param iterable $scopes Required scopes.
     * @param string $integrationId The integration ID.
     */
    function integrationHasScopes(iterable $scopes, string $integrationId)
    {
    }
    /**
     * @param ?ProjectUpdateFilter $filter Filter returned project updates.
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function projectUpdates(?ProjectUpdateFilter $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function integrationsSettings(string $id)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function integrationTemplates(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function integrationTemplate(string $id)
    {
    }
    /**
     * @param string $code OAuth code.
     */
    function issueImportFinishGithubOAuth(string $code)
    {
    }
    /**
     * @param string $csvUrl CSV storage url.
     * @param string $service The service the CSV containing data from.
     */
    function issueImportCheckCSV(string $csvUrl, string $service)
    {
    }
    /**
     * @param ?IssueLabelFilter $filter Filter returned issue labels.
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function issueLabels(?IssueLabelFilter $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function issueLabel(string $id)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function issueRelations(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function issueRelation(string $id)
    {
    }
    /**
     * @param ?IssueFilter $filter Filter returned issues.
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     * @param iterable $sort [INTERNAL] Sort returned issues.
     */
    function issues(iterable $sort, ?IssueFilter $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function issue(string $id)
    {
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
     */
    function issueSearch(?IssueFilter $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?string $query = null)
    {
    }
    /**
     * @param string $branchName The VCS branch name to search for.
     */
    function issueVcsBranchSearch(string $branchName)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     * @param string $fileKey The Figma file key.
     */
    function issueFigmaFileKeySearch(string $fileKey, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    function issuePriorityValues()
    {
    }
    /**
     * @param ?string $projectId The ID of the project if filtering a project view
     * @param string $prompt
     */
    function issueFilterSuggestion(string $prompt, ?string $projectId = null)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function notifications(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function notification(string $id)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function notificationSubscriptions(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function notificationSubscription(string $id)
    {
    }
    /**
     * @param string $id The ID of the organization domain to claim.
     */
    function organizationDomainClaimRequest(string $id)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function organizationInvites(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function organizationInvite(string $id)
    {
    }
    /**
     * @param string $id
     */
    function organizationInviteDetails(string $id)
    {
    }
    function organization()
    {
    }
    /**
     * @param string $urlKey
     */
    function organizationExists(string $urlKey)
    {
    }
    function archivedTeams()
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function projectLinks(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function projectLink(string $id)
    {
    }
    /**
     * @param ?ProjectMilestoneFilter $filter Filter returned project milestones.
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function projectMilestones(?ProjectMilestoneFilter $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function projectMilestone(string $id)
    {
    }
    /**
     * @param ?ProjectFilter $filter Filter returned projects.
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function projects(?ProjectFilter $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function project(string $id)
    {
    }
    /**
     * @param string $prompt
     */
    function projectFilterSuggestion(string $prompt)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function projectUpdateInteractions(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id The identifier of the project update interaction to retrieve.
     */
    function projectUpdateInteraction(string $id)
    {
    }
    /**
     * @param string $id The identifier of the project update to retrieve.
     */
    function projectUpdate(string $id)
    {
    }
    /**
     * @param ?bool $targetMobile Whether to send to mobile devices.
     * @param ?SendStrategy $sendStrategy The send strategy to use.
     */
    function pushSubscriptionTest(?bool $targetMobile = null, ?SendStrategy $sendStrategy = null)
    {
    }
    function rateLimitStatus()
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function roadmaps(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function roadmap(string $id)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function roadmapToProjects(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function roadmapToProject(string $id)
    {
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
     */
    function searchDocuments(string $term, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?float $snippetSize = null, ?bool $includeComments = null, ?string $teamId = null)
    {
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
     */
    function searchProjects(string $term, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?float $snippetSize = null, ?bool $includeComments = null, ?string $teamId = null)
    {
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
     */
    function searchIssues(string $term, ?IssueFilter $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null, ?float $snippetSize = null, ?bool $includeComments = null, ?string $teamId = null)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function teamMemberships(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function teamMembership(string $id)
    {
    }
    /**
     * @param ?TeamFilter $filter Filter returned teams.
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function teams(?TeamFilter $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param ?TeamFilter $filter Filter returned teams.
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function administrableTeams(?TeamFilter $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function team(string $id)
    {
    }
    function templates()
    {
    }
    /**
     * @param string $id The identifier of the template to retrieve.
     */
    function template(string $id)
    {
    }
    /**
     * @param string $integrationType The type of integration for which to return associated templates.
     */
    function templatesForIntegration(string $integrationType)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function timeSchedules(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id The identifier of the time schedule to retrieve.
     */
    function timeSchedule(string $id)
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function triageResponsibilities(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id The identifier of the triage responsibility to retrieve.
     */
    function triageResponsibility(string $id)
    {
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
     */
    function users(?UserFilter $filter = null, ?bool $includeDisabled = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id The identifier of the user to retrieve. To retrieve the authenticated user, use `viewer` query.
     */
    function user(string $id)
    {
    }
    function viewer()
    {
    }
    function userSettings()
    {
    }
    /**
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function webhooks(?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id The identifier of the webhook to retrieve.
     */
    function webhook(string $id)
    {
    }
    /**
     * @param ?WorkflowStateFilter $filter Filter returned workflow states.
     * @param ?string $before A cursor to be used with last for backward pagination.
     * @param ?string $after A cursor to be used with first for forward pagination
     * @param ?int $first The number of items to forward paginate (used with after). Defaults to 50.
     * @param ?int $last The number of items to backward paginate (used with before). Defaults to 50.
     * @param ?bool $includeArchived Should archived resources be included (default: false)
     * @param ?PaginationOrderBy $orderBy By which field should the pagination order by. Available options are createdAt (default) and updatedAt.
     */
    function workflowStates(?WorkflowStateFilter $filter = null, ?string $before = null, ?string $after = null, ?int $first = null, ?int $last = null, ?bool $includeArchived = null, ?PaginationOrderBy $orderBy = null)
    {
    }
    /**
     * @param string $id
     */
    function workflowState(string $id)
    {
    }
}
