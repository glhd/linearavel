<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\Notification;
use Glhd\Linearavel\Data\Contracts\NotificationSubscription;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Query extends Data
{
	function __construct(
		public Optional|ApiKeyConnection $apiKeys,
		public Optional|Application $applicationInfo,
		/** @var Collection<int, Application> */
		public Optional|Collection $applicationInfoByIds,
		/** @var Collection<int, WorkspaceAuthorizedApplication> */
		public Optional|Collection $applicationInfoWithMembershipsByIds,
		public Optional|UserAuthorizedApplication $applicationWithAuthorization,
		/** @var Collection<int, AuthorizedApplication> */
		public Optional|Collection $authorizedApplications,
		/** @var Collection<int, WorkspaceAuthorizedApplication> */
		public Optional|Collection $workspaceAuthorizedApplications,
		public Optional|AttachmentConnection $attachments,
		public Optional|Attachment $attachment,
		public Optional|AttachmentConnection $attachmentsForURL,
		public Optional|Issue $attachmentIssue,
		public Optional|AttachmentSourcesPayload $attachmentSources,
		/** @var Collection<int, AuditEntryType> */
		public Optional|Collection $auditEntryTypes,
		public Optional|AuditEntryConnection $auditEntries,
		public Optional|AuthResolverResponse $availableUsers,
		/** @var Collection<int, AuthenticationSessionResponse> */
		public Optional|Collection $authenticationSessions,
		public Optional|SsoUrlFromEmailResponse $ssoUrlFromEmail,
		public Optional|CommentConnection $comments,
		public Optional|Comment $comment,
		public Optional|CustomViewConnection $customViews,
		public Optional|CustomView $customView,
		public Optional|CustomViewSuggestionPayload $customViewDetailsSuggestion,
		public Optional|CustomViewHasSubscribersPayload $customViewHasSubscribers,
		public Optional|CycleConnection $cycles,
		public Optional|Cycle $cycle,
		public Optional|DocumentContentHistoryPayload $documentContentHistory,
		public Optional|DocumentConnection $documents,
		public Optional|Document $document,
		public Optional|EmojiConnection $emojis,
		public Optional|Emoji $emoji,
		public Optional|ExternalUserConnection $externalUsers,
		public Optional|ExternalUser $externalUser,
		public Optional|InitiativeToProjectConnection $initiativeToProjects,
		public Optional|InitiativeToProject $initiativeToProject,
		public Optional|InitiativeConnection $initiatives,
		public Optional|Initiative $initiative,
		public Optional|FavoriteConnection $favorites,
		public Optional|Favorite $favorite,
		public Optional|IntegrationConnection $integrations,
		public Optional|Integration $integration,
		public Optional|IntegrationHasScopesPayload $integrationHasScopes,
		public Optional|ProjectUpdateConnection $projectUpdates,
		public Optional|IntegrationsSettings $integrationsSettings,
		public Optional|IntegrationTemplateConnection $integrationTemplates,
		public Optional|IntegrationTemplate $integrationTemplate,
		public Optional|GithubOAuthTokenPayload $issueImportFinishGithubOAuth,
		public Optional|IssueImportCheckPayload $issueImportCheckCSV,
		public Optional|IssueLabelConnection $issueLabels,
		public Optional|IssueLabel $issueLabel,
		public Optional|IssueRelationConnection $issueRelations,
		public Optional|IssueRelation $issueRelation,
		public Optional|IssueConnection $issues,
		public Optional|Issue $issue,
		public Optional|IssueConnection $issueSearch,
		public Optional|Issue|null $issueVcsBranchSearch,
		public Optional|IssueConnection $issueFigmaFileKeySearch,
		/** @var Collection<int, IssuePriorityValue> */
		public Optional|Collection $issuePriorityValues,
		public Optional|IssueFilterSuggestionPayload $issueFilterSuggestion,
		public Optional|NotificationConnection $notifications,
		public Optional|Notification $notification,
		public Optional|NotificationSubscriptionConnection $notificationSubscriptions,
		public Optional|NotificationSubscription $notificationSubscription,
		public Optional|OrganizationDomainClaimPayload $organizationDomainClaimRequest,
		public Optional|OrganizationInviteConnection $organizationInvites,
		public Optional|OrganizationInvite $organizationInvite,
		public Optional|OrganizationInviteDetailsPayload $organizationInviteDetails,
		public Optional|Organization $organization,
		public Optional|OrganizationExistsPayload $organizationExists,
		/** @var Collection<int, Team> */
		public Optional|Collection $archivedTeams,
		public Optional|ProjectLinkConnection $projectLinks,
		public Optional|ProjectLink $projectLink,
		public Optional|ProjectMilestoneConnection $projectMilestones,
		public Optional|ProjectMilestone $projectMilestone,
		public Optional|ProjectConnection $projects,
		public Optional|Project $project,
		public Optional|ProjectFilterSuggestionPayload $projectFilterSuggestion,
		public Optional|ProjectUpdateInteractionConnection $projectUpdateInteractions,
		public Optional|ProjectUpdateInteraction $projectUpdateInteraction,
		public Optional|ProjectUpdate $projectUpdate,
		public Optional|PushSubscriptionTestPayload $pushSubscriptionTest,
		public Optional|RateLimitPayload $rateLimitStatus,
		public Optional|RoadmapConnection $roadmaps,
		public Optional|Roadmap $roadmap,
		public Optional|RoadmapToProjectConnection $roadmapToProjects,
		public Optional|RoadmapToProject $roadmapToProject,
		public Optional|DocumentSearchPayload $searchDocuments,
		public Optional|ProjectSearchPayload $searchProjects,
		public Optional|IssueSearchPayload $searchIssues,
		public Optional|TeamMembershipConnection $teamMemberships,
		public Optional|TeamMembership $teamMembership,
		public Optional|TeamConnection $teams,
		public Optional|TeamConnection $administrableTeams,
		public Optional|Team $team,
		/** @var Collection<int, Template> */
		public Optional|Collection $templates,
		public Optional|Template $template,
		/** @var Collection<int, Template> */
		public Optional|Collection $templatesForIntegration,
		public Optional|TimeScheduleConnection $timeSchedules,
		public Optional|TimeSchedule $timeSchedule,
		public Optional|TriageResponsibilityConnection $triageResponsibilities,
		public Optional|TriageResponsibility $triageResponsibility,
		public Optional|UserConnection $users,
		public Optional|User $user,
		public Optional|User $viewer,
		public Optional|UserSettings $userSettings,
		public Optional|WebhookConnection $webhooks,
		public Optional|Webhook $webhook,
		public Optional|WorkflowStateConnection $workflowStates,
		public Optional|WorkflowState $workflowState
	) {
	}
}
