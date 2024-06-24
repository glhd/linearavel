<?php

namespace Glhd\Linearavel\Connectors;

use DateTimeInterface;
use Glhd\Linearavel\Data\Enums\UserFlagType;
use Glhd\Linearavel\Data\Enums\UserFlagUpdateOperation;
use Glhd\Linearavel\Requests\Inputs\AirbyteConfigurationInput;
use Glhd\Linearavel\Requests\Inputs\ApiKeyCreateInput;
use Glhd\Linearavel\Requests\Inputs\AttachmentCreateInput;
use Glhd\Linearavel\Requests\Inputs\AttachmentUpdateInput;
use Glhd\Linearavel\Requests\Inputs\CommentCreateInput;
use Glhd\Linearavel\Requests\Inputs\CommentUpdateInput;
use Glhd\Linearavel\Requests\Inputs\ContactCreateInput;
use Glhd\Linearavel\Requests\Inputs\ContactSalesCreateInput;
use Glhd\Linearavel\Requests\Inputs\CreateOrganizationInput;
use Glhd\Linearavel\Requests\Inputs\CustomViewCreateInput;
use Glhd\Linearavel\Requests\Inputs\CustomViewUpdateInput;
use Glhd\Linearavel\Requests\Inputs\CycleCreateInput;
use Glhd\Linearavel\Requests\Inputs\CycleShiftAllInput;
use Glhd\Linearavel\Requests\Inputs\CycleUpdateInput;
use Glhd\Linearavel\Requests\Inputs\DeleteOrganizationInput;
use Glhd\Linearavel\Requests\Inputs\DocumentCreateInput;
use Glhd\Linearavel\Requests\Inputs\DocumentUpdateInput;
use Glhd\Linearavel\Requests\Inputs\EmailIntakeAddressCreateInput;
use Glhd\Linearavel\Requests\Inputs\EmailIntakeAddressUpdateInput;
use Glhd\Linearavel\Requests\Inputs\EmailUnsubscribeInput;
use Glhd\Linearavel\Requests\Inputs\EmailUserAccountAuthChallengeInput;
use Glhd\Linearavel\Requests\Inputs\EmojiCreateInput;
use Glhd\Linearavel\Requests\Inputs\FavoriteCreateInput;
use Glhd\Linearavel\Requests\Inputs\FavoriteUpdateInput;
use Glhd\Linearavel\Requests\Inputs\GitAutomationStateCreateInput;
use Glhd\Linearavel\Requests\Inputs\GitAutomationStateUpdateInput;
use Glhd\Linearavel\Requests\Inputs\GitAutomationTargetBranchCreateInput;
use Glhd\Linearavel\Requests\Inputs\GitAutomationTargetBranchUpdateInput;
use Glhd\Linearavel\Requests\Inputs\GoogleUserAccountAuthInput;
use Glhd\Linearavel\Requests\Inputs\InitiativeCreateInput;
use Glhd\Linearavel\Requests\Inputs\InitiativeToProjectCreateInput;
use Glhd\Linearavel\Requests\Inputs\InitiativeToProjectUpdateInput;
use Glhd\Linearavel\Requests\Inputs\InitiativeUpdateInput;
use Glhd\Linearavel\Requests\Inputs\IntegrationRequestInput;
use Glhd\Linearavel\Requests\Inputs\IntegrationSettingsInput;
use Glhd\Linearavel\Requests\Inputs\IntegrationsSettingsCreateInput;
use Glhd\Linearavel\Requests\Inputs\IntegrationsSettingsUpdateInput;
use Glhd\Linearavel\Requests\Inputs\IntegrationTemplateCreateInput;
use Glhd\Linearavel\Requests\Inputs\IntercomSettingsInput;
use Glhd\Linearavel\Requests\Inputs\IssueCreateInput;
use Glhd\Linearavel\Requests\Inputs\IssueImportUpdateInput;
use Glhd\Linearavel\Requests\Inputs\IssueLabelCreateInput;
use Glhd\Linearavel\Requests\Inputs\IssueLabelUpdateInput;
use Glhd\Linearavel\Requests\Inputs\IssueRelationCreateInput;
use Glhd\Linearavel\Requests\Inputs\IssueRelationUpdateInput;
use Glhd\Linearavel\Requests\Inputs\IssueUpdateInput;
use Glhd\Linearavel\Requests\Inputs\JiraConfigurationInput;
use Glhd\Linearavel\Requests\Inputs\JiraUpdateInput;
use Glhd\Linearavel\Requests\Inputs\JoinOrganizationInput;
use Glhd\Linearavel\Requests\Inputs\NotificationEntityInput;
use Glhd\Linearavel\Requests\Inputs\NotificationSubscriptionCreateInput;
use Glhd\Linearavel\Requests\Inputs\NotificationSubscriptionUpdateInput;
use Glhd\Linearavel\Requests\Inputs\NotificationUpdateInput;
use Glhd\Linearavel\Requests\Inputs\OnboardingCustomerSurvey;
use Glhd\Linearavel\Requests\Inputs\OrganizationDomainCreateInput;
use Glhd\Linearavel\Requests\Inputs\OrganizationDomainVerificationInput;
use Glhd\Linearavel\Requests\Inputs\OrganizationInviteCreateInput;
use Glhd\Linearavel\Requests\Inputs\OrganizationInviteUpdateInput;
use Glhd\Linearavel\Requests\Inputs\OrganizationUpdateInput;
use Glhd\Linearavel\Requests\Inputs\ProjectCreateInput;
use Glhd\Linearavel\Requests\Inputs\ProjectLinkCreateInput;
use Glhd\Linearavel\Requests\Inputs\ProjectLinkUpdateInput;
use Glhd\Linearavel\Requests\Inputs\ProjectMilestoneCreateInput;
use Glhd\Linearavel\Requests\Inputs\ProjectMilestoneUpdateInput;
use Glhd\Linearavel\Requests\Inputs\ProjectUpdateCreateInput;
use Glhd\Linearavel\Requests\Inputs\ProjectUpdateInput;
use Glhd\Linearavel\Requests\Inputs\ProjectUpdateInteractionCreateInput;
use Glhd\Linearavel\Requests\Inputs\ProjectUpdateUpdateInput;
use Glhd\Linearavel\Requests\Inputs\PushSubscriptionCreateInput;
use Glhd\Linearavel\Requests\Inputs\ReactionCreateInput;
use Glhd\Linearavel\Requests\Inputs\RoadmapCreateInput;
use Glhd\Linearavel\Requests\Inputs\RoadmapToProjectCreateInput;
use Glhd\Linearavel\Requests\Inputs\RoadmapToProjectUpdateInput;
use Glhd\Linearavel\Requests\Inputs\RoadmapUpdateInput;
use Glhd\Linearavel\Requests\Inputs\TeamCreateInput;
use Glhd\Linearavel\Requests\Inputs\TeamMembershipCreateInput;
use Glhd\Linearavel\Requests\Inputs\TeamMembershipUpdateInput;
use Glhd\Linearavel\Requests\Inputs\TeamUpdateInput;
use Glhd\Linearavel\Requests\Inputs\TemplateCreateInput;
use Glhd\Linearavel\Requests\Inputs\TemplateUpdateInput;
use Glhd\Linearavel\Requests\Inputs\TimeScheduleCreateInput;
use Glhd\Linearavel\Requests\Inputs\TimeScheduleUpdateInput;
use Glhd\Linearavel\Requests\Inputs\TokenUserAccountAuthInput;
use Glhd\Linearavel\Requests\Inputs\TriageResponsibilityCreateInput;
use Glhd\Linearavel\Requests\Inputs\TriageResponsibilityUpdateInput;
use Glhd\Linearavel\Requests\Inputs\UserSettingsUpdateInput;
use Glhd\Linearavel\Requests\Inputs\UserUpdateInput;
use Glhd\Linearavel\Requests\Inputs\ViewPreferencesCreateInput;
use Glhd\Linearavel\Requests\Inputs\ViewPreferencesUpdateInput;
use Glhd\Linearavel\Requests\Inputs\WebhookCreateInput;
use Glhd\Linearavel\Requests\Inputs\WebhookUpdateInput;
use Glhd\Linearavel\Requests\Inputs\WorkflowStateCreateInput;
use Glhd\Linearavel\Requests\Inputs\WorkflowStateUpdateInput;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAirbyteIntegrationConnectRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingApiKeyCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingApiKeyDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentArchiveRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkDiscordRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkFrontRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkGitHubIssueRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkGitHubPRRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkGitLabMRRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkIntercomRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkJiraIssueRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkSlackRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkURLRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkZendeskRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentUnsyncSlackRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCommentCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCommentDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCommentResolveRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCommentUnresolveRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCommentUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingContactCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingContactSalesCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCreateCsvExportReportRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCreateOrganizationFromOnboardingRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCreateProjectUpdateReminderRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCustomViewCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCustomViewDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCustomViewUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCycleArchiveRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCycleCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCycleShiftAllRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCycleUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingDocumentCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingDocumentDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingDocumentUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingEmailIntakeAddressCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingEmailIntakeAddressDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingEmailIntakeAddressRotateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingEmailIntakeAddressUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingEmailTokenUserAccountAuthRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingEmailUnsubscribeRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingEmailUserAccountAuthChallengeRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingEmojiCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingEmojiDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingFavoriteCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingFavoriteDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingFavoriteUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingFileUploadRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingGitAutomationStateCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingGitAutomationStateDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingGitAutomationStateUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingGitAutomationTargetBranchCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingGitAutomationTargetBranchDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingGitAutomationTargetBranchUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingGoogleUserAccountAuthRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingImageUploadFromUrlRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingImportFileUploadRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingInitiativeArchiveRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingInitiativeCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingInitiativeDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingInitiativeToProjectCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingInitiativeToProjectDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingInitiativeToProjectUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingInitiativeUnarchiveRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingInitiativeUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationArchiveRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationAsksConnectChannelRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationDiscordRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationFigmaRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationFrontRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationGithubCommitCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationGithubConnectRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationGitHubPersonalRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationGitlabConnectRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationGoogleCalendarPersonalConnectRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationGoogleSheetsRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationIntercomDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationIntercomRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationIntercomSettingsUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationJiraPersonalRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationJiraUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationLoomRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationOpsgenieConnectRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationOpsgenieRefreshScheduleMappingsRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationPagerDutyConnectRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationPagerDutyRefreshScheduleMappingsRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationRequestRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationSentryConnectRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationSettingsUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationSlackAsksRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationSlackImportEmojisRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationSlackOrgProjectUpdatesPostRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationSlackPersonalRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationSlackPostRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationSlackProjectPostRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationSlackRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationsSettingsCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationsSettingsUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationTemplateCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationTemplateDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationUpdateSlackRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationZendeskRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueAddLabelRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueArchiveRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueBatchUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueDescriptionUpdateFromFrontRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueImportCreateAsanaRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueImportCreateClubhouseRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueImportCreateCSVJiraRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueImportCreateGithubRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueImportCreateJiraRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueImportDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueImportProcessRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueImportUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueLabelCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueLabelDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueLabelUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueRelationCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueRelationDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueRelationUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueReminderRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueRemoveLabelRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueSubscribeRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueUnarchiveRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueUnsubscribeRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingJiraIntegrationConnectRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingJoinOrganizationFromOnboardingRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingLeaveOrganizationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingLogoutAllSessionsRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingLogoutOtherSessionsRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingLogoutRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingLogoutSessionRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationArchiveAllRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationArchiveRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationMarkReadAllRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationMarkUnreadAllRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationSnoozeAllRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationSubscriptionCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationSubscriptionDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationSubscriptionUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationUnarchiveRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationUnsnoozeAllRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationCancelDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationDeleteChallengeRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationDomainClaimRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationDomainCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationDomainDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationDomainVerifyRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationInviteCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationInviteDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationInviteUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationStartPlusTrialRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectArchiveRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectLinkCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectLinkDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectLinkUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectMilestoneCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectMilestoneDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectMilestoneUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectUnarchiveRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectUpdateCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectUpdateDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectUpdateInteractionCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectUpdateMarkAsReadRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectUpdateUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingPushSubscriptionCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingPushSubscriptionDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingReactionCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingReactionDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingRefreshGoogleSheetsDataRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingResendOrganizationInviteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingRoadmapArchiveRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingRoadmapCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingRoadmapDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingRoadmapToProjectCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingRoadmapToProjectDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingRoadmapToProjectUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingRoadmapUnarchiveRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingRoadmapUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingSamlTokenUserAccountAuthRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTeamCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTeamCyclesDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTeamDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTeamKeyDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTeamMembershipCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTeamMembershipDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTeamMembershipUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTeamUnarchiveRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTeamUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTemplateCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTemplateDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTemplateUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTimeScheduleCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTimeScheduleDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTimeScheduleRefreshIntegrationScheduleRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTimeScheduleUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTimeScheduleUpsertExternalRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTriageResponsibilityCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTriageResponsibilityDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTriageResponsibilityUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserDemoteAdminRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserDemoteMemberRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserDiscordConnectRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserExternalUserDisconnectRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserFlagUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserPromoteAdminRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserPromoteMemberRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserSettingsFlagIncrementRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserSettingsFlagsResetRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserSettingsUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserSuspendRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserUnsuspendRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingViewPreferencesCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingViewPreferencesDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingViewPreferencesUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingWebhookCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingWebhookDeleteRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingWebhookUpdateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingWorkflowStateArchiveRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingWorkflowStateCreateRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingWorkflowStateUpdateRequest;

trait MutatesLinear
{
	public function apiKeyCreateMutation(ApiKeyCreateInput $input): PendingApiKeyCreateRequest
	{
		return new PendingApiKeyCreateRequest($this, ['input' => $input]);
	}
	
	public function apiKeyDeleteMutation(string $id): PendingApiKeyDeleteRequest
	{
		return new PendingApiKeyDeleteRequest($this, ['id' => $id]);
	}
	
	public function attachmentCreateMutation(AttachmentCreateInput $input): PendingAttachmentCreateRequest
	{
		return new PendingAttachmentCreateRequest($this, ['input' => $input]);
	}
	
	public function attachmentUpdateMutation(AttachmentUpdateInput $input, string $id): PendingAttachmentUpdateRequest
	{
		return new PendingAttachmentUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function attachmentUnsyncSlackMutation(string $id): PendingAttachmentUnsyncSlackRequest
	{
		return new PendingAttachmentUnsyncSlackRequest($this, ['id' => $id]);
	}
	
	public function attachmentLinkURLMutation(
		string $url,
		string $issueId,
		?string $createAsUser = null,
		?string $displayIconUrl = null,
		?string $title = null,
		?string $id = null
	): PendingAttachmentLinkURLRequest {
		return new PendingAttachmentLinkURLRequest($this, ['url' => $url, 'issueId' => $issueId, 'createAsUser' => $createAsUser, 'displayIconUrl' => $displayIconUrl, 'title' => $title, 'id' => $id]);
	}
	
	public function attachmentLinkGitLabMRMutation(
		string $issueId,
		string $url,
		string $projectPathWithNamespace,
		float $number,
		?string $createAsUser = null,
		?string $displayIconUrl = null,
		?string $title = null,
		?string $id = null
	): PendingAttachmentLinkGitLabMRRequest {
		return new PendingAttachmentLinkGitLabMRRequest($this, [
			'issueId' => $issueId,
			'url' => $url,
			'projectPathWithNamespace' => $projectPathWithNamespace,
			'number' => $number,
			'createAsUser' => $createAsUser,
			'displayIconUrl' => $displayIconUrl,
			'title' => $title,
			'id' => $id,
		]);
	}
	
	public function attachmentLinkGitHubIssueMutation(
		string $issueId,
		string $url,
		?string $createAsUser = null,
		?string $displayIconUrl = null,
		?string $title = null,
		?string $id = null
	): PendingAttachmentLinkGitHubIssueRequest {
		return new PendingAttachmentLinkGitHubIssueRequest($this, [
			'issueId' => $issueId,
			'url' => $url,
			'createAsUser' => $createAsUser,
			'displayIconUrl' => $displayIconUrl,
			'title' => $title,
			'id' => $id,
		]);
	}
	
	public function attachmentLinkGitHubPRMutation(
		string $issueId,
		string $url,
		?string $createAsUser = null,
		?string $displayIconUrl = null,
		?string $title = null,
		?string $id = null,
		?string $owner = null,
		?string $repo = null,
		?float $number = null
	): PendingAttachmentLinkGitHubPRRequest {
		return new PendingAttachmentLinkGitHubPRRequest($this, [
			'issueId' => $issueId,
			'url' => $url,
			'createAsUser' => $createAsUser,
			'displayIconUrl' => $displayIconUrl,
			'title' => $title,
			'id' => $id,
			'owner' => $owner,
			'repo' => $repo,
			'number' => $number,
		]);
	}
	
	public function attachmentLinkZendeskMutation(
		string $ticketId,
		string $issueId,
		?string $createAsUser = null,
		?string $displayIconUrl = null,
		?string $title = null,
		?string $id = null
	): PendingAttachmentLinkZendeskRequest {
		return new PendingAttachmentLinkZendeskRequest($this, [
			'ticketId' => $ticketId,
			'issueId' => $issueId,
			'createAsUser' => $createAsUser,
			'displayIconUrl' => $displayIconUrl,
			'title' => $title,
			'id' => $id,
		]);
	}
	
	public function attachmentLinkDiscordMutation(
		string $issueId,
		string $channelId,
		string $messageId,
		string $url,
		?string $createAsUser = null,
		?string $displayIconUrl = null,
		?string $title = null,
		?string $id = null
	): PendingAttachmentLinkDiscordRequest {
		return new PendingAttachmentLinkDiscordRequest($this, [
			'issueId' => $issueId,
			'channelId' => $channelId,
			'messageId' => $messageId,
			'url' => $url,
			'createAsUser' => $createAsUser,
			'displayIconUrl' => $displayIconUrl,
			'title' => $title,
			'id' => $id,
		]);
	}
	
	public function attachmentLinkSlackMutation(
		string $channel,
		string $latest,
		string $issueId,
		string $url,
		?string $createAsUser = null,
		?string $displayIconUrl = null,
		?string $title = null,
		?string $ts = null,
		?string $id = null
	): PendingAttachmentLinkSlackRequest {
		return new PendingAttachmentLinkSlackRequest($this, [
			'channel' => $channel,
			'latest' => $latest,
			'issueId' => $issueId,
			'url' => $url,
			'createAsUser' => $createAsUser,
			'displayIconUrl' => $displayIconUrl,
			'title' => $title,
			'ts' => $ts,
			'id' => $id,
		]);
	}
	
	public function attachmentLinkFrontMutation(
		string $conversationId,
		string $issueId,
		?string $createAsUser = null,
		?string $displayIconUrl = null,
		?string $title = null,
		?string $id = null
	): PendingAttachmentLinkFrontRequest {
		return new PendingAttachmentLinkFrontRequest($this, [
			'conversationId' => $conversationId,
			'issueId' => $issueId,
			'createAsUser' => $createAsUser,
			'displayIconUrl' => $displayIconUrl,
			'title' => $title,
			'id' => $id,
		]);
	}
	
	public function attachmentLinkIntercomMutation(
		string $conversationId,
		string $issueId,
		?string $createAsUser = null,
		?string $displayIconUrl = null,
		?string $title = null,
		?string $id = null
	): PendingAttachmentLinkIntercomRequest {
		return new PendingAttachmentLinkIntercomRequest($this, [
			'conversationId' => $conversationId,
			'issueId' => $issueId,
			'createAsUser' => $createAsUser,
			'displayIconUrl' => $displayIconUrl,
			'title' => $title,
			'id' => $id,
		]);
	}
	
	public function attachmentLinkJiraIssueMutation(string $issueId, string $jiraIssueId): PendingAttachmentLinkJiraIssueRequest
	{
		return new PendingAttachmentLinkJiraIssueRequest($this, ['issueId' => $issueId, 'jiraIssueId' => $jiraIssueId]);
	}
	
	public function attachmentArchiveMutation(string $id): PendingAttachmentArchiveRequest
	{
		return new PendingAttachmentArchiveRequest($this, ['id' => $id]);
	}
	
	public function attachmentDeleteMutation(string $id): PendingAttachmentDeleteRequest
	{
		return new PendingAttachmentDeleteRequest($this, ['id' => $id]);
	}
	
	public function emailUserAccountAuthChallengeMutation(EmailUserAccountAuthChallengeInput $input): PendingEmailUserAccountAuthChallengeRequest
	{
		return new PendingEmailUserAccountAuthChallengeRequest($this, ['input' => $input]);
	}
	
	public function emailTokenUserAccountAuthMutation(TokenUserAccountAuthInput $input): PendingEmailTokenUserAccountAuthRequest
	{
		return new PendingEmailTokenUserAccountAuthRequest($this, ['input' => $input]);
	}
	
	public function samlTokenUserAccountAuthMutation(TokenUserAccountAuthInput $input): PendingSamlTokenUserAccountAuthRequest
	{
		return new PendingSamlTokenUserAccountAuthRequest($this, ['input' => $input]);
	}
	
	public function googleUserAccountAuthMutation(GoogleUserAccountAuthInput $input): PendingGoogleUserAccountAuthRequest
	{
		return new PendingGoogleUserAccountAuthRequest($this, ['input' => $input]);
	}
	
	public function createOrganizationFromOnboardingMutation(CreateOrganizationInput $input, ?OnboardingCustomerSurvey $survey = null): PendingCreateOrganizationFromOnboardingRequest
	{
		return new PendingCreateOrganizationFromOnboardingRequest($this, ['input' => $input, 'survey' => $survey]);
	}
	
	public function joinOrganizationFromOnboardingMutation(JoinOrganizationInput $input): PendingJoinOrganizationFromOnboardingRequest
	{
		return new PendingJoinOrganizationFromOnboardingRequest($this, ['input' => $input]);
	}
	
	public function leaveOrganizationMutation(string $organizationId): PendingLeaveOrganizationRequest
	{
		return new PendingLeaveOrganizationRequest($this, ['organizationId' => $organizationId]);
	}
	
	public function logoutMutation(): PendingLogoutRequest
	{
		return new PendingLogoutRequest($this, []);
	}
	
	public function logoutSessionMutation(string $sessionId): PendingLogoutSessionRequest
	{
		return new PendingLogoutSessionRequest($this, ['sessionId' => $sessionId]);
	}
	
	public function logoutAllSessionsMutation(): PendingLogoutAllSessionsRequest
	{
		return new PendingLogoutAllSessionsRequest($this, []);
	}
	
	public function logoutOtherSessionsMutation(): PendingLogoutOtherSessionsRequest
	{
		return new PendingLogoutOtherSessionsRequest($this, []);
	}
	
	public function commentCreateMutation(CommentCreateInput $input): PendingCommentCreateRequest
	{
		return new PendingCommentCreateRequest($this, ['input' => $input]);
	}
	
	public function commentUpdateMutation(CommentUpdateInput $input, string $id): PendingCommentUpdateRequest
	{
		return new PendingCommentUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function commentDeleteMutation(string $id): PendingCommentDeleteRequest
	{
		return new PendingCommentDeleteRequest($this, ['id' => $id]);
	}
	
	public function commentResolveMutation(string $id, ?string $resolvingCommentId = null): PendingCommentResolveRequest
	{
		return new PendingCommentResolveRequest($this, ['id' => $id, 'resolvingCommentId' => $resolvingCommentId]);
	}
	
	public function commentUnresolveMutation(string $id): PendingCommentUnresolveRequest
	{
		return new PendingCommentUnresolveRequest($this, ['id' => $id]);
	}
	
	public function contactCreateMutation(ContactCreateInput $input): PendingContactCreateRequest
	{
		return new PendingContactCreateRequest($this, ['input' => $input]);
	}
	
	public function contactSalesCreateMutation(ContactSalesCreateInput $input): PendingContactSalesCreateRequest
	{
		return new PendingContactSalesCreateRequest($this, ['input' => $input]);
	}
	
	public function customViewCreateMutation(CustomViewCreateInput $input): PendingCustomViewCreateRequest
	{
		return new PendingCustomViewCreateRequest($this, ['input' => $input]);
	}
	
	public function customViewUpdateMutation(CustomViewUpdateInput $input, string $id): PendingCustomViewUpdateRequest
	{
		return new PendingCustomViewUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function customViewDeleteMutation(string $id): PendingCustomViewDeleteRequest
	{
		return new PendingCustomViewDeleteRequest($this, ['id' => $id]);
	}
	
	public function cycleCreateMutation(CycleCreateInput $input): PendingCycleCreateRequest
	{
		return new PendingCycleCreateRequest($this, ['input' => $input]);
	}
	
	public function cycleUpdateMutation(CycleUpdateInput $input, string $id): PendingCycleUpdateRequest
	{
		return new PendingCycleUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function cycleArchiveMutation(string $id): PendingCycleArchiveRequest
	{
		return new PendingCycleArchiveRequest($this, ['id' => $id]);
	}
	
	public function cycleShiftAllMutation(CycleShiftAllInput $input): PendingCycleShiftAllRequest
	{
		return new PendingCycleShiftAllRequest($this, ['input' => $input]);
	}
	
	public function documentCreateMutation(DocumentCreateInput $input): PendingDocumentCreateRequest
	{
		return new PendingDocumentCreateRequest($this, ['input' => $input]);
	}
	
	public function documentUpdateMutation(DocumentUpdateInput $input, string $id): PendingDocumentUpdateRequest
	{
		return new PendingDocumentUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function documentDeleteMutation(string $id): PendingDocumentDeleteRequest
	{
		return new PendingDocumentDeleteRequest($this, ['id' => $id]);
	}
	
	public function emailIntakeAddressCreateMutation(EmailIntakeAddressCreateInput $input): PendingEmailIntakeAddressCreateRequest
	{
		return new PendingEmailIntakeAddressCreateRequest($this, ['input' => $input]);
	}
	
	public function emailIntakeAddressRotateMutation(string $id): PendingEmailIntakeAddressRotateRequest
	{
		return new PendingEmailIntakeAddressRotateRequest($this, ['id' => $id]);
	}
	
	public function emailIntakeAddressUpdateMutation(EmailIntakeAddressUpdateInput $input, string $id): PendingEmailIntakeAddressUpdateRequest
	{
		return new PendingEmailIntakeAddressUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function emailIntakeAddressDeleteMutation(string $id): PendingEmailIntakeAddressDeleteRequest
	{
		return new PendingEmailIntakeAddressDeleteRequest($this, ['id' => $id]);
	}
	
	public function emailUnsubscribeMutation(EmailUnsubscribeInput $input): PendingEmailUnsubscribeRequest
	{
		return new PendingEmailUnsubscribeRequest($this, ['input' => $input]);
	}
	
	public function emojiCreateMutation(EmojiCreateInput $input): PendingEmojiCreateRequest
	{
		return new PendingEmojiCreateRequest($this, ['input' => $input]);
	}
	
	public function emojiDeleteMutation(string $id): PendingEmojiDeleteRequest
	{
		return new PendingEmojiDeleteRequest($this, ['id' => $id]);
	}
	
	public function initiativeToProjectCreateMutation(InitiativeToProjectCreateInput $input): PendingInitiativeToProjectCreateRequest
	{
		return new PendingInitiativeToProjectCreateRequest($this, ['input' => $input]);
	}
	
	public function initiativeToProjectUpdateMutation(InitiativeToProjectUpdateInput $input, string $id): PendingInitiativeToProjectUpdateRequest
	{
		return new PendingInitiativeToProjectUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function initiativeToProjectDeleteMutation(string $id): PendingInitiativeToProjectDeleteRequest
	{
		return new PendingInitiativeToProjectDeleteRequest($this, ['id' => $id]);
	}
	
	public function initiativeCreateMutation(InitiativeCreateInput $input): PendingInitiativeCreateRequest
	{
		return new PendingInitiativeCreateRequest($this, ['input' => $input]);
	}
	
	public function initiativeUpdateMutation(InitiativeUpdateInput $input, string $id): PendingInitiativeUpdateRequest
	{
		return new PendingInitiativeUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function initiativeArchiveMutation(string $id): PendingInitiativeArchiveRequest
	{
		return new PendingInitiativeArchiveRequest($this, ['id' => $id]);
	}
	
	public function initiativeUnarchiveMutation(string $id): PendingInitiativeUnarchiveRequest
	{
		return new PendingInitiativeUnarchiveRequest($this, ['id' => $id]);
	}
	
	public function initiativeDeleteMutation(string $id): PendingInitiativeDeleteRequest
	{
		return new PendingInitiativeDeleteRequest($this, ['id' => $id]);
	}
	
	public function favoriteCreateMutation(FavoriteCreateInput $input): PendingFavoriteCreateRequest
	{
		return new PendingFavoriteCreateRequest($this, ['input' => $input]);
	}
	
	public function favoriteUpdateMutation(FavoriteUpdateInput $input, string $id): PendingFavoriteUpdateRequest
	{
		return new PendingFavoriteUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function favoriteDeleteMutation(string $id): PendingFavoriteDeleteRequest
	{
		return new PendingFavoriteDeleteRequest($this, ['id' => $id]);
	}
	
	public function fileUploadMutation(int $size, string $contentType, string $filename, ?string $metaData = null, ?bool $makePublic = null): PendingFileUploadRequest
	{
		return new PendingFileUploadRequest($this, ['size' => $size, 'contentType' => $contentType, 'filename' => $filename, 'metaData' => $metaData, 'makePublic' => $makePublic]);
	}
	
	public function importFileUploadMutation(int $size, string $contentType, string $filename, ?string $metaData = null): PendingImportFileUploadRequest
	{
		return new PendingImportFileUploadRequest($this, ['size' => $size, 'contentType' => $contentType, 'filename' => $filename, 'metaData' => $metaData]);
	}
	
	public function imageUploadFromUrlMutation(string $url): PendingImageUploadFromUrlRequest
	{
		return new PendingImageUploadFromUrlRequest($this, ['url' => $url]);
	}
	
	public function gitAutomationStateCreateMutation(GitAutomationStateCreateInput $input): PendingGitAutomationStateCreateRequest
	{
		return new PendingGitAutomationStateCreateRequest($this, ['input' => $input]);
	}
	
	public function gitAutomationStateUpdateMutation(GitAutomationStateUpdateInput $input, string $id): PendingGitAutomationStateUpdateRequest
	{
		return new PendingGitAutomationStateUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function gitAutomationStateDeleteMutation(string $id): PendingGitAutomationStateDeleteRequest
	{
		return new PendingGitAutomationStateDeleteRequest($this, ['id' => $id]);
	}
	
	public function gitAutomationTargetBranchCreateMutation(GitAutomationTargetBranchCreateInput $input): PendingGitAutomationTargetBranchCreateRequest
	{
		return new PendingGitAutomationTargetBranchCreateRequest($this, ['input' => $input]);
	}
	
	public function gitAutomationTargetBranchUpdateMutation(GitAutomationTargetBranchUpdateInput $input, string $id): PendingGitAutomationTargetBranchUpdateRequest
	{
		return new PendingGitAutomationTargetBranchUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function gitAutomationTargetBranchDeleteMutation(string $id): PendingGitAutomationTargetBranchDeleteRequest
	{
		return new PendingGitAutomationTargetBranchDeleteRequest($this, ['id' => $id]);
	}
	
	public function integrationRequestMutation(IntegrationRequestInput $input): PendingIntegrationRequestRequest
	{
		return new PendingIntegrationRequestRequest($this, ['input' => $input]);
	}
	
	public function integrationSettingsUpdateMutation(IntegrationSettingsInput $input, string $id): PendingIntegrationSettingsUpdateRequest
	{
		return new PendingIntegrationSettingsUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function integrationGithubCommitCreateMutation(): PendingIntegrationGithubCommitCreateRequest
	{
		return new PendingIntegrationGithubCommitCreateRequest($this, []);
	}
	
	public function integrationGithubConnectMutation(string $installationId): PendingIntegrationGithubConnectRequest
	{
		return new PendingIntegrationGithubConnectRequest($this, ['installationId' => $installationId]);
	}
	
	public function integrationGitlabConnectMutation(string $gitlabUrl, string $accessToken): PendingIntegrationGitlabConnectRequest
	{
		return new PendingIntegrationGitlabConnectRequest($this, ['gitlabUrl' => $gitlabUrl, 'accessToken' => $accessToken]);
	}
	
	public function airbyteIntegrationConnectMutation(AirbyteConfigurationInput $input): PendingAirbyteIntegrationConnectRequest
	{
		return new PendingAirbyteIntegrationConnectRequest($this, ['input' => $input]);
	}
	
	public function integrationGoogleCalendarPersonalConnectMutation(string $code): PendingIntegrationGoogleCalendarPersonalConnectRequest
	{
		return new PendingIntegrationGoogleCalendarPersonalConnectRequest($this, ['code' => $code]);
	}
	
	public function jiraIntegrationConnectMutation(JiraConfigurationInput $input): PendingJiraIntegrationConnectRequest
	{
		return new PendingJiraIntegrationConnectRequest($this, ['input' => $input]);
	}
	
	public function integrationJiraUpdateMutation(JiraUpdateInput $input): PendingIntegrationJiraUpdateRequest
	{
		return new PendingIntegrationJiraUpdateRequest($this, ['input' => $input]);
	}
	
	public function integrationJiraPersonalMutation(?string $code = null, ?string $accessToken = null): PendingIntegrationJiraPersonalRequest
	{
		return new PendingIntegrationJiraPersonalRequest($this, ['code' => $code, 'accessToken' => $accessToken]);
	}
	
	public function integrationGitHubPersonalMutation(string $code): PendingIntegrationGitHubPersonalRequest
	{
		return new PendingIntegrationGitHubPersonalRequest($this, ['code' => $code]);
	}
	
	public function integrationIntercomMutation(string $redirectUri, string $code, ?string $domainUrl = null): PendingIntegrationIntercomRequest
	{
		return new PendingIntegrationIntercomRequest($this, ['redirectUri' => $redirectUri, 'code' => $code, 'domainUrl' => $domainUrl]);
	}
	
	public function integrationIntercomDeleteMutation(): PendingIntegrationIntercomDeleteRequest
	{
		return new PendingIntegrationIntercomDeleteRequest($this, []);
	}
	
	public function integrationIntercomSettingsUpdateMutation(IntercomSettingsInput $input): PendingIntegrationIntercomSettingsUpdateRequest
	{
		return new PendingIntegrationIntercomSettingsUpdateRequest($this, ['input' => $input]);
	}
	
	public function integrationDiscordMutation(string $redirectUri, string $code): PendingIntegrationDiscordRequest
	{
		return new PendingIntegrationDiscordRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}
	
	public function integrationOpsgenieConnectMutation(string $apiKey): PendingIntegrationOpsgenieConnectRequest
	{
		return new PendingIntegrationOpsgenieConnectRequest($this, ['apiKey' => $apiKey]);
	}
	
	public function integrationOpsgenieRefreshScheduleMappingsMutation(): PendingIntegrationOpsgenieRefreshScheduleMappingsRequest
	{
		return new PendingIntegrationOpsgenieRefreshScheduleMappingsRequest($this, []);
	}
	
	public function integrationPagerDutyConnectMutation(string $code, string $redirectUri): PendingIntegrationPagerDutyConnectRequest
	{
		return new PendingIntegrationPagerDutyConnectRequest($this, ['code' => $code, 'redirectUri' => $redirectUri]);
	}
	
	public function integrationPagerDutyRefreshScheduleMappingsMutation(): PendingIntegrationPagerDutyRefreshScheduleMappingsRequest
	{
		return new PendingIntegrationPagerDutyRefreshScheduleMappingsRequest($this, []);
	}
	
	public function integrationUpdateSlackMutation(string $redirectUri, string $code): PendingIntegrationUpdateSlackRequest
	{
		return new PendingIntegrationUpdateSlackRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}
	
	public function integrationSlackMutation(string $redirectUri, string $code, ?bool $shouldUseV2Auth = null): PendingIntegrationSlackRequest
	{
		return new PendingIntegrationSlackRequest($this, ['redirectUri' => $redirectUri, 'code' => $code, 'shouldUseV2Auth' => $shouldUseV2Auth]);
	}
	
	public function integrationSlackAsksMutation(string $redirectUri, string $code): PendingIntegrationSlackAsksRequest
	{
		return new PendingIntegrationSlackAsksRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}
	
	public function integrationSlackPersonalMutation(string $redirectUri, string $code): PendingIntegrationSlackPersonalRequest
	{
		return new PendingIntegrationSlackPersonalRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}
	
	public function integrationAsksConnectChannelMutation(string $redirectUri, string $code): PendingIntegrationAsksConnectChannelRequest
	{
		return new PendingIntegrationAsksConnectChannelRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}
	
	public function integrationSlackPostMutation(string $redirectUri, string $teamId, string $code, ?bool $shouldUseV2Auth = null): PendingIntegrationSlackPostRequest
	{
		return new PendingIntegrationSlackPostRequest($this, ['redirectUri' => $redirectUri, 'teamId' => $teamId, 'code' => $code, 'shouldUseV2Auth' => $shouldUseV2Auth]);
	}
	
	public function integrationSlackProjectPostMutation(string $service, string $redirectUri, string $projectId, string $code): PendingIntegrationSlackProjectPostRequest
	{
		return new PendingIntegrationSlackProjectPostRequest($this, ['service' => $service, 'redirectUri' => $redirectUri, 'projectId' => $projectId, 'code' => $code]);
	}
	
	public function integrationSlackOrgProjectUpdatesPostMutation(string $redirectUri, string $code): PendingIntegrationSlackOrgProjectUpdatesPostRequest
	{
		return new PendingIntegrationSlackOrgProjectUpdatesPostRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}
	
	public function integrationSlackImportEmojisMutation(string $redirectUri, string $code): PendingIntegrationSlackImportEmojisRequest
	{
		return new PendingIntegrationSlackImportEmojisRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}
	
	public function integrationFigmaMutation(string $redirectUri, string $code): PendingIntegrationFigmaRequest
	{
		return new PendingIntegrationFigmaRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}
	
	public function integrationGoogleSheetsMutation(string $code): PendingIntegrationGoogleSheetsRequest
	{
		return new PendingIntegrationGoogleSheetsRequest($this, ['code' => $code]);
	}
	
	public function refreshGoogleSheetsDataMutation(string $id): PendingRefreshGoogleSheetsDataRequest
	{
		return new PendingRefreshGoogleSheetsDataRequest($this, ['id' => $id]);
	}
	
	public function integrationSentryConnectMutation(string $organizationSlug, string $code, string $installationId): PendingIntegrationSentryConnectRequest
	{
		return new PendingIntegrationSentryConnectRequest($this, ['organizationSlug' => $organizationSlug, 'code' => $code, 'installationId' => $installationId]);
	}
	
	public function integrationFrontMutation(string $redirectUri, string $code): PendingIntegrationFrontRequest
	{
		return new PendingIntegrationFrontRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}
	
	public function integrationZendeskMutation(string $subdomain, string $code, string $scope, string $redirectUri): PendingIntegrationZendeskRequest
	{
		return new PendingIntegrationZendeskRequest($this, ['subdomain' => $subdomain, 'code' => $code, 'scope' => $scope, 'redirectUri' => $redirectUri]);
	}
	
	public function integrationLoomMutation(): PendingIntegrationLoomRequest
	{
		return new PendingIntegrationLoomRequest($this, []);
	}
	
	public function integrationDeleteMutation(string $id): PendingIntegrationDeleteRequest
	{
		return new PendingIntegrationDeleteRequest($this, ['id' => $id]);
	}
	
	public function integrationArchiveMutation(string $id): PendingIntegrationArchiveRequest
	{
		return new PendingIntegrationArchiveRequest($this, ['id' => $id]);
	}
	
	public function integrationsSettingsCreateMutation(IntegrationsSettingsCreateInput $input): PendingIntegrationsSettingsCreateRequest
	{
		return new PendingIntegrationsSettingsCreateRequest($this, ['input' => $input]);
	}
	
	public function integrationsSettingsUpdateMutation(IntegrationsSettingsUpdateInput $input, string $id): PendingIntegrationsSettingsUpdateRequest
	{
		return new PendingIntegrationsSettingsUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function integrationTemplateCreateMutation(IntegrationTemplateCreateInput $input): PendingIntegrationTemplateCreateRequest
	{
		return new PendingIntegrationTemplateCreateRequest($this, ['input' => $input]);
	}
	
	public function integrationTemplateDeleteMutation(string $id): PendingIntegrationTemplateDeleteRequest
	{
		return new PendingIntegrationTemplateDeleteRequest($this, ['id' => $id]);
	}
	
	public function issueImportCreateGithubMutation(
		string $githubToken,
		string $githubRepoName,
		string $githubRepoOwner,
		?string $organizationId = null,
		?string $teamId = null,
		?string $teamName = null,
		?bool $githubShouldImportOrgProjects = null,
		?bool $instantProcess = null,
		?bool $includeClosedIssues = null,
		?string $id = null
	): PendingIssueImportCreateGithubRequest {
		return new PendingIssueImportCreateGithubRequest($this, [
			'githubToken' => $githubToken,
			'githubRepoName' => $githubRepoName,
			'githubRepoOwner' => $githubRepoOwner,
			'organizationId' => $organizationId,
			'teamId' => $teamId,
			'teamName' => $teamName,
			'githubShouldImportOrgProjects' => $githubShouldImportOrgProjects,
			'instantProcess' => $instantProcess,
			'includeClosedIssues' => $includeClosedIssues,
			'id' => $id,
		]);
	}
	
	public function issueImportCreateJiraMutation(
		string $jiraToken,
		string $jiraProject,
		string $jiraEmail,
		string $jiraHostname,
		?string $organizationId = null,
		?string $teamId = null,
		?string $teamName = null,
		?bool $instantProcess = null,
		?bool $includeClosedIssues = null,
		?string $id = null
	): PendingIssueImportCreateJiraRequest {
		return new PendingIssueImportCreateJiraRequest($this, [
			'jiraToken' => $jiraToken,
			'jiraProject' => $jiraProject,
			'jiraEmail' => $jiraEmail,
			'jiraHostname' => $jiraHostname,
			'organizationId' => $organizationId,
			'teamId' => $teamId,
			'teamName' => $teamName,
			'instantProcess' => $instantProcess,
			'includeClosedIssues' => $includeClosedIssues,
			'id' => $id,
		]);
	}
	
	public function issueImportCreateCSVJiraMutation(
		string $csvUrl,
		?string $organizationId = null,
		?string $teamId = null,
		?string $teamName = null,
		?string $jiraHostname = null,
		?string $jiraToken = null,
		?string $jiraEmail = null
	): PendingIssueImportCreateCSVJiraRequest {
		return new PendingIssueImportCreateCSVJiraRequest($this, [
			'csvUrl' => $csvUrl,
			'organizationId' => $organizationId,
			'teamId' => $teamId,
			'teamName' => $teamName,
			'jiraHostname' => $jiraHostname,
			'jiraToken' => $jiraToken,
			'jiraEmail' => $jiraEmail,
		]);
	}
	
	public function issueImportCreateClubhouseMutation(
		string $clubhouseToken,
		string $clubhouseGroupName,
		?string $organizationId = null,
		?string $teamId = null,
		?string $teamName = null,
		?bool $instantProcess = null,
		?bool $includeClosedIssues = null,
		?string $id = null
	): PendingIssueImportCreateClubhouseRequest {
		return new PendingIssueImportCreateClubhouseRequest($this, [
			'clubhouseToken' => $clubhouseToken,
			'clubhouseGroupName' => $clubhouseGroupName,
			'organizationId' => $organizationId,
			'teamId' => $teamId,
			'teamName' => $teamName,
			'instantProcess' => $instantProcess,
			'includeClosedIssues' => $includeClosedIssues,
			'id' => $id,
		]);
	}
	
	public function issueImportCreateAsanaMutation(
		string $asanaToken,
		string $asanaTeamName,
		?string $organizationId = null,
		?string $teamId = null,
		?string $teamName = null,
		?bool $instantProcess = null,
		?bool $includeClosedIssues = null,
		?string $id = null
	): PendingIssueImportCreateAsanaRequest {
		return new PendingIssueImportCreateAsanaRequest($this, [
			'asanaToken' => $asanaToken,
			'asanaTeamName' => $asanaTeamName,
			'organizationId' => $organizationId,
			'teamId' => $teamId,
			'teamName' => $teamName,
			'instantProcess' => $instantProcess,
			'includeClosedIssues' => $includeClosedIssues,
			'id' => $id,
		]);
	}
	
	public function issueImportDeleteMutation(string $issueImportId): PendingIssueImportDeleteRequest
	{
		return new PendingIssueImportDeleteRequest($this, ['issueImportId' => $issueImportId]);
	}
	
	public function issueImportProcessMutation(string $mapping, string $issueImportId): PendingIssueImportProcessRequest
	{
		return new PendingIssueImportProcessRequest($this, ['mapping' => $mapping, 'issueImportId' => $issueImportId]);
	}
	
	public function issueImportUpdateMutation(IssueImportUpdateInput $input, string $id): PendingIssueImportUpdateRequest
	{
		return new PendingIssueImportUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function issueLabelCreateMutation(IssueLabelCreateInput $input, ?bool $replaceTeamLabels = null): PendingIssueLabelCreateRequest
	{
		return new PendingIssueLabelCreateRequest($this, ['input' => $input, 'replaceTeamLabels' => $replaceTeamLabels]);
	}
	
	public function issueLabelUpdateMutation(IssueLabelUpdateInput $input, string $id): PendingIssueLabelUpdateRequest
	{
		return new PendingIssueLabelUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function issueLabelDeleteMutation(string $id): PendingIssueLabelDeleteRequest
	{
		return new PendingIssueLabelDeleteRequest($this, ['id' => $id]);
	}
	
	public function issueRelationCreateMutation(IssueRelationCreateInput $input): PendingIssueRelationCreateRequest
	{
		return new PendingIssueRelationCreateRequest($this, ['input' => $input]);
	}
	
	public function issueRelationUpdateMutation(IssueRelationUpdateInput $input, string $id): PendingIssueRelationUpdateRequest
	{
		return new PendingIssueRelationUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function issueRelationDeleteMutation(string $id): PendingIssueRelationDeleteRequest
	{
		return new PendingIssueRelationDeleteRequest($this, ['id' => $id]);
	}
	
	public function issueCreateMutation(IssueCreateInput $input): PendingIssueCreateRequest
	{
		return new PendingIssueCreateRequest($this, ['input' => $input]);
	}
	
	public function issueUpdateMutation(IssueUpdateInput $input, string $id): PendingIssueUpdateRequest
	{
		return new PendingIssueUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function issueBatchUpdateMutation(IssueUpdateInput $input, iterable $ids): PendingIssueBatchUpdateRequest
	{
		return new PendingIssueBatchUpdateRequest($this, ['input' => $input, 'ids' => $ids]);
	}
	
	public function issueArchiveMutation(string $id, ?bool $trash = null): PendingIssueArchiveRequest
	{
		return new PendingIssueArchiveRequest($this, ['id' => $id, 'trash' => $trash]);
	}
	
	public function issueUnarchiveMutation(string $id): PendingIssueUnarchiveRequest
	{
		return new PendingIssueUnarchiveRequest($this, ['id' => $id]);
	}
	
	public function issueDeleteMutation(string $id): PendingIssueDeleteRequest
	{
		return new PendingIssueDeleteRequest($this, ['id' => $id]);
	}
	
	public function issueAddLabelMutation(string $labelId, string $id): PendingIssueAddLabelRequest
	{
		return new PendingIssueAddLabelRequest($this, ['labelId' => $labelId, 'id' => $id]);
	}
	
	public function issueRemoveLabelMutation(string $labelId, string $id): PendingIssueRemoveLabelRequest
	{
		return new PendingIssueRemoveLabelRequest($this, ['labelId' => $labelId, 'id' => $id]);
	}
	
	public function issueReminderMutation(DateTimeInterface $reminderAt, string $id): PendingIssueReminderRequest
	{
		return new PendingIssueReminderRequest($this, ['reminderAt' => $reminderAt, 'id' => $id]);
	}
	
	public function issueSubscribeMutation(string $id, ?string $userId = null): PendingIssueSubscribeRequest
	{
		return new PendingIssueSubscribeRequest($this, ['id' => $id, 'userId' => $userId]);
	}
	
	public function issueUnsubscribeMutation(string $id, ?string $userId = null): PendingIssueUnsubscribeRequest
	{
		return new PendingIssueUnsubscribeRequest($this, ['id' => $id, 'userId' => $userId]);
	}
	
	public function issueDescriptionUpdateFromFrontMutation(string $description, string $id): PendingIssueDescriptionUpdateFromFrontRequest
	{
		return new PendingIssueDescriptionUpdateFromFrontRequest($this, ['description' => $description, 'id' => $id]);
	}
	
	public function notificationUpdateMutation(NotificationUpdateInput $input, string $id): PendingNotificationUpdateRequest
	{
		return new PendingNotificationUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function notificationMarkReadAllMutation(DateTimeInterface $readAt, NotificationEntityInput $input): PendingNotificationMarkReadAllRequest
	{
		return new PendingNotificationMarkReadAllRequest($this, ['readAt' => $readAt, 'input' => $input]);
	}
	
	public function notificationMarkUnreadAllMutation(NotificationEntityInput $input): PendingNotificationMarkUnreadAllRequest
	{
		return new PendingNotificationMarkUnreadAllRequest($this, ['input' => $input]);
	}
	
	public function notificationSnoozeAllMutation(DateTimeInterface $snoozedUntilAt, NotificationEntityInput $input): PendingNotificationSnoozeAllRequest
	{
		return new PendingNotificationSnoozeAllRequest($this, ['snoozedUntilAt' => $snoozedUntilAt, 'input' => $input]);
	}
	
	public function notificationUnsnoozeAllMutation(DateTimeInterface $unsnoozedAt, NotificationEntityInput $input): PendingNotificationUnsnoozeAllRequest
	{
		return new PendingNotificationUnsnoozeAllRequest($this, ['unsnoozedAt' => $unsnoozedAt, 'input' => $input]);
	}
	
	public function notificationArchiveMutation(string $id): PendingNotificationArchiveRequest
	{
		return new PendingNotificationArchiveRequest($this, ['id' => $id]);
	}
	
	public function notificationArchiveAllMutation(NotificationEntityInput $input): PendingNotificationArchiveAllRequest
	{
		return new PendingNotificationArchiveAllRequest($this, ['input' => $input]);
	}
	
	public function notificationUnarchiveMutation(string $id): PendingNotificationUnarchiveRequest
	{
		return new PendingNotificationUnarchiveRequest($this, ['id' => $id]);
	}
	
	public function notificationSubscriptionCreateMutation(NotificationSubscriptionCreateInput $input): PendingNotificationSubscriptionCreateRequest
	{
		return new PendingNotificationSubscriptionCreateRequest($this, ['input' => $input]);
	}
	
	public function notificationSubscriptionUpdateMutation(NotificationSubscriptionUpdateInput $input, string $id): PendingNotificationSubscriptionUpdateRequest
	{
		return new PendingNotificationSubscriptionUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function notificationSubscriptionDeleteMutation(string $id): PendingNotificationSubscriptionDeleteRequest
	{
		return new PendingNotificationSubscriptionDeleteRequest($this, ['id' => $id]);
	}
	
	public function organizationDomainClaimMutation(string $id): PendingOrganizationDomainClaimRequest
	{
		return new PendingOrganizationDomainClaimRequest($this, ['id' => $id]);
	}
	
	public function organizationDomainVerifyMutation(OrganizationDomainVerificationInput $input): PendingOrganizationDomainVerifyRequest
	{
		return new PendingOrganizationDomainVerifyRequest($this, ['input' => $input]);
	}
	
	public function organizationDomainCreateMutation(OrganizationDomainCreateInput $input, ?bool $triggerEmailVerification = null): PendingOrganizationDomainCreateRequest
	{
		return new PendingOrganizationDomainCreateRequest($this, ['input' => $input, 'triggerEmailVerification' => $triggerEmailVerification]);
	}
	
	public function organizationDomainDeleteMutation(string $id): PendingOrganizationDomainDeleteRequest
	{
		return new PendingOrganizationDomainDeleteRequest($this, ['id' => $id]);
	}
	
	public function organizationInviteCreateMutation(OrganizationInviteCreateInput $input): PendingOrganizationInviteCreateRequest
	{
		return new PendingOrganizationInviteCreateRequest($this, ['input' => $input]);
	}
	
	public function organizationInviteUpdateMutation(OrganizationInviteUpdateInput $input, string $id): PendingOrganizationInviteUpdateRequest
	{
		return new PendingOrganizationInviteUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function resendOrganizationInviteMutation(string $id): PendingResendOrganizationInviteRequest
	{
		return new PendingResendOrganizationInviteRequest($this, ['id' => $id]);
	}
	
	public function organizationInviteDeleteMutation(string $id): PendingOrganizationInviteDeleteRequest
	{
		return new PendingOrganizationInviteDeleteRequest($this, ['id' => $id]);
	}
	
	public function organizationUpdateMutation(OrganizationUpdateInput $input): PendingOrganizationUpdateRequest
	{
		return new PendingOrganizationUpdateRequest($this, ['input' => $input]);
	}
	
	public function organizationDeleteChallengeMutation(): PendingOrganizationDeleteChallengeRequest
	{
		return new PendingOrganizationDeleteChallengeRequest($this, []);
	}
	
	public function organizationDeleteMutation(DeleteOrganizationInput $input): PendingOrganizationDeleteRequest
	{
		return new PendingOrganizationDeleteRequest($this, ['input' => $input]);
	}
	
	public function organizationCancelDeleteMutation(): PendingOrganizationCancelDeleteRequest
	{
		return new PendingOrganizationCancelDeleteRequest($this, []);
	}
	
	public function organizationStartPlusTrialMutation(): PendingOrganizationStartPlusTrialRequest
	{
		return new PendingOrganizationStartPlusTrialRequest($this, []);
	}
	
	public function projectLinkCreateMutation(ProjectLinkCreateInput $input): PendingProjectLinkCreateRequest
	{
		return new PendingProjectLinkCreateRequest($this, ['input' => $input]);
	}
	
	public function projectLinkUpdateMutation(ProjectLinkUpdateInput $input, string $id): PendingProjectLinkUpdateRequest
	{
		return new PendingProjectLinkUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function projectLinkDeleteMutation(string $id): PendingProjectLinkDeleteRequest
	{
		return new PendingProjectLinkDeleteRequest($this, ['id' => $id]);
	}
	
	public function projectMilestoneCreateMutation(ProjectMilestoneCreateInput $input): PendingProjectMilestoneCreateRequest
	{
		return new PendingProjectMilestoneCreateRequest($this, ['input' => $input]);
	}
	
	public function projectMilestoneUpdateMutation(ProjectMilestoneUpdateInput $input, string $id): PendingProjectMilestoneUpdateRequest
	{
		return new PendingProjectMilestoneUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function projectMilestoneDeleteMutation(string $id): PendingProjectMilestoneDeleteRequest
	{
		return new PendingProjectMilestoneDeleteRequest($this, ['id' => $id]);
	}
	
	public function projectCreateMutation(ProjectCreateInput $input, ?bool $connectSlackChannel = null): PendingProjectCreateRequest
	{
		return new PendingProjectCreateRequest($this, ['input' => $input, 'connectSlackChannel' => $connectSlackChannel]);
	}
	
	public function projectUpdateMutation(ProjectUpdateInput $input, string $id): PendingProjectUpdateRequest
	{
		return new PendingProjectUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function projectDeleteMutation(string $id): PendingProjectDeleteRequest
	{
		return new PendingProjectDeleteRequest($this, ['id' => $id]);
	}
	
	public function projectArchiveMutation(string $id, ?bool $trash = null): PendingProjectArchiveRequest
	{
		return new PendingProjectArchiveRequest($this, ['id' => $id, 'trash' => $trash]);
	}
	
	public function projectUnarchiveMutation(string $id): PendingProjectUnarchiveRequest
	{
		return new PendingProjectUnarchiveRequest($this, ['id' => $id]);
	}
	
	public function projectUpdateInteractionCreateMutation(ProjectUpdateInteractionCreateInput $input): PendingProjectUpdateInteractionCreateRequest
	{
		return new PendingProjectUpdateInteractionCreateRequest($this, ['input' => $input]);
	}
	
	public function projectUpdateCreateMutation(ProjectUpdateCreateInput $input): PendingProjectUpdateCreateRequest
	{
		return new PendingProjectUpdateCreateRequest($this, ['input' => $input]);
	}
	
	public function projectUpdateUpdateMutation(ProjectUpdateUpdateInput $input, string $id): PendingProjectUpdateUpdateRequest
	{
		return new PendingProjectUpdateUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function projectUpdateDeleteMutation(string $id): PendingProjectUpdateDeleteRequest
	{
		return new PendingProjectUpdateDeleteRequest($this, ['id' => $id]);
	}
	
	public function projectUpdateMarkAsReadMutation(string $id): PendingProjectUpdateMarkAsReadRequest
	{
		return new PendingProjectUpdateMarkAsReadRequest($this, ['id' => $id]);
	}
	
	public function createProjectUpdateReminderMutation(string $projectId, ?string $userId = null): PendingCreateProjectUpdateReminderRequest
	{
		return new PendingCreateProjectUpdateReminderRequest($this, ['projectId' => $projectId, 'userId' => $userId]);
	}
	
	public function pushSubscriptionCreateMutation(PushSubscriptionCreateInput $input): PendingPushSubscriptionCreateRequest
	{
		return new PendingPushSubscriptionCreateRequest($this, ['input' => $input]);
	}
	
	public function pushSubscriptionDeleteMutation(string $id): PendingPushSubscriptionDeleteRequest
	{
		return new PendingPushSubscriptionDeleteRequest($this, ['id' => $id]);
	}
	
	public function reactionCreateMutation(ReactionCreateInput $input): PendingReactionCreateRequest
	{
		return new PendingReactionCreateRequest($this, ['input' => $input]);
	}
	
	public function reactionDeleteMutation(string $id): PendingReactionDeleteRequest
	{
		return new PendingReactionDeleteRequest($this, ['id' => $id]);
	}
	
	public function createCsvExportReportMutation(?iterable $includePrivateTeamIds = null): PendingCreateCsvExportReportRequest
	{
		return new PendingCreateCsvExportReportRequest($this, ['includePrivateTeamIds' => $includePrivateTeamIds]);
	}
	
	public function roadmapCreateMutation(RoadmapCreateInput $input): PendingRoadmapCreateRequest
	{
		return new PendingRoadmapCreateRequest($this, ['input' => $input]);
	}
	
	public function roadmapUpdateMutation(RoadmapUpdateInput $input, string $id): PendingRoadmapUpdateRequest
	{
		return new PendingRoadmapUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function roadmapArchiveMutation(string $id): PendingRoadmapArchiveRequest
	{
		return new PendingRoadmapArchiveRequest($this, ['id' => $id]);
	}
	
	public function roadmapUnarchiveMutation(string $id): PendingRoadmapUnarchiveRequest
	{
		return new PendingRoadmapUnarchiveRequest($this, ['id' => $id]);
	}
	
	public function roadmapDeleteMutation(string $id): PendingRoadmapDeleteRequest
	{
		return new PendingRoadmapDeleteRequest($this, ['id' => $id]);
	}
	
	public function roadmapToProjectCreateMutation(RoadmapToProjectCreateInput $input): PendingRoadmapToProjectCreateRequest
	{
		return new PendingRoadmapToProjectCreateRequest($this, ['input' => $input]);
	}
	
	public function roadmapToProjectUpdateMutation(RoadmapToProjectUpdateInput $input, string $id): PendingRoadmapToProjectUpdateRequest
	{
		return new PendingRoadmapToProjectUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function roadmapToProjectDeleteMutation(string $id): PendingRoadmapToProjectDeleteRequest
	{
		return new PendingRoadmapToProjectDeleteRequest($this, ['id' => $id]);
	}
	
	public function teamKeyDeleteMutation(string $id): PendingTeamKeyDeleteRequest
	{
		return new PendingTeamKeyDeleteRequest($this, ['id' => $id]);
	}
	
	public function teamMembershipCreateMutation(TeamMembershipCreateInput $input): PendingTeamMembershipCreateRequest
	{
		return new PendingTeamMembershipCreateRequest($this, ['input' => $input]);
	}
	
	public function teamMembershipUpdateMutation(TeamMembershipUpdateInput $input, string $id): PendingTeamMembershipUpdateRequest
	{
		return new PendingTeamMembershipUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function teamMembershipDeleteMutation(string $id): PendingTeamMembershipDeleteRequest
	{
		return new PendingTeamMembershipDeleteRequest($this, ['id' => $id]);
	}
	
	public function teamCreateMutation(TeamCreateInput $input, ?string $copySettingsFromTeamId = null): PendingTeamCreateRequest
	{
		return new PendingTeamCreateRequest($this, ['input' => $input, 'copySettingsFromTeamId' => $copySettingsFromTeamId]);
	}
	
	public function teamUpdateMutation(TeamUpdateInput $input, string $id): PendingTeamUpdateRequest
	{
		return new PendingTeamUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function teamDeleteMutation(string $id): PendingTeamDeleteRequest
	{
		return new PendingTeamDeleteRequest($this, ['id' => $id]);
	}
	
	public function teamUnarchiveMutation(string $id): PendingTeamUnarchiveRequest
	{
		return new PendingTeamUnarchiveRequest($this, ['id' => $id]);
	}
	
	public function teamCyclesDeleteMutation(string $id): PendingTeamCyclesDeleteRequest
	{
		return new PendingTeamCyclesDeleteRequest($this, ['id' => $id]);
	}
	
	public function templateCreateMutation(TemplateCreateInput $input): PendingTemplateCreateRequest
	{
		return new PendingTemplateCreateRequest($this, ['input' => $input]);
	}
	
	public function templateUpdateMutation(TemplateUpdateInput $input, string $id): PendingTemplateUpdateRequest
	{
		return new PendingTemplateUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function templateDeleteMutation(string $id): PendingTemplateDeleteRequest
	{
		return new PendingTemplateDeleteRequest($this, ['id' => $id]);
	}
	
	public function timeScheduleCreateMutation(TimeScheduleCreateInput $input): PendingTimeScheduleCreateRequest
	{
		return new PendingTimeScheduleCreateRequest($this, ['input' => $input]);
	}
	
	public function timeScheduleUpdateMutation(TimeScheduleUpdateInput $input, string $id): PendingTimeScheduleUpdateRequest
	{
		return new PendingTimeScheduleUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function timeScheduleUpsertExternalMutation(TimeScheduleUpdateInput $input, string $externalId): PendingTimeScheduleUpsertExternalRequest
	{
		return new PendingTimeScheduleUpsertExternalRequest($this, ['input' => $input, 'externalId' => $externalId]);
	}
	
	public function timeScheduleDeleteMutation(string $id): PendingTimeScheduleDeleteRequest
	{
		return new PendingTimeScheduleDeleteRequest($this, ['id' => $id]);
	}
	
	public function timeScheduleRefreshIntegrationScheduleMutation(string $id): PendingTimeScheduleRefreshIntegrationScheduleRequest
	{
		return new PendingTimeScheduleRefreshIntegrationScheduleRequest($this, ['id' => $id]);
	}
	
	public function triageResponsibilityCreateMutation(TriageResponsibilityCreateInput $input): PendingTriageResponsibilityCreateRequest
	{
		return new PendingTriageResponsibilityCreateRequest($this, ['input' => $input]);
	}
	
	public function triageResponsibilityUpdateMutation(TriageResponsibilityUpdateInput $input, string $id): PendingTriageResponsibilityUpdateRequest
	{
		return new PendingTriageResponsibilityUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function triageResponsibilityDeleteMutation(string $id): PendingTriageResponsibilityDeleteRequest
	{
		return new PendingTriageResponsibilityDeleteRequest($this, ['id' => $id]);
	}
	
	public function userUpdateMutation(UserUpdateInput $input, string $id): PendingUserUpdateRequest
	{
		return new PendingUserUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function userDiscordConnectMutation(string $redirectUri, string $code): PendingUserDiscordConnectRequest
	{
		return new PendingUserDiscordConnectRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}
	
	public function userExternalUserDisconnectMutation(string $service): PendingUserExternalUserDisconnectRequest
	{
		return new PendingUserExternalUserDisconnectRequest($this, ['service' => $service]);
	}
	
	public function userPromoteAdminMutation(string $id): PendingUserPromoteAdminRequest
	{
		return new PendingUserPromoteAdminRequest($this, ['id' => $id]);
	}
	
	public function userDemoteAdminMutation(string $id): PendingUserDemoteAdminRequest
	{
		return new PendingUserDemoteAdminRequest($this, ['id' => $id]);
	}
	
	public function userPromoteMemberMutation(string $id): PendingUserPromoteMemberRequest
	{
		return new PendingUserPromoteMemberRequest($this, ['id' => $id]);
	}
	
	public function userDemoteMemberMutation(string $id): PendingUserDemoteMemberRequest
	{
		return new PendingUserDemoteMemberRequest($this, ['id' => $id]);
	}
	
	public function userSuspendMutation(string $id): PendingUserSuspendRequest
	{
		return new PendingUserSuspendRequest($this, ['id' => $id]);
	}
	
	public function userUnsuspendMutation(string $id): PendingUserUnsuspendRequest
	{
		return new PendingUserUnsuspendRequest($this, ['id' => $id]);
	}
	
	public function userSettingsUpdateMutation(UserSettingsUpdateInput $input, string $id): PendingUserSettingsUpdateRequest
	{
		return new PendingUserSettingsUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function userSettingsFlagIncrementMutation(string $flag): PendingUserSettingsFlagIncrementRequest
	{
		return new PendingUserSettingsFlagIncrementRequest($this, ['flag' => $flag]);
	}
	
	public function userSettingsFlagsResetMutation(?iterable $flags = null): PendingUserSettingsFlagsResetRequest
	{
		return new PendingUserSettingsFlagsResetRequest($this, ['flags' => $flags]);
	}
	
	public function userFlagUpdateMutation(UserFlagUpdateOperation $operation, UserFlagType $flag): PendingUserFlagUpdateRequest
	{
		return new PendingUserFlagUpdateRequest($this, ['operation' => $operation, 'flag' => $flag]);
	}
	
	public function viewPreferencesCreateMutation(ViewPreferencesCreateInput $input): PendingViewPreferencesCreateRequest
	{
		return new PendingViewPreferencesCreateRequest($this, ['input' => $input]);
	}
	
	public function viewPreferencesUpdateMutation(ViewPreferencesUpdateInput $input, string $id): PendingViewPreferencesUpdateRequest
	{
		return new PendingViewPreferencesUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function viewPreferencesDeleteMutation(string $id): PendingViewPreferencesDeleteRequest
	{
		return new PendingViewPreferencesDeleteRequest($this, ['id' => $id]);
	}
	
	public function webhookCreateMutation(WebhookCreateInput $input): PendingWebhookCreateRequest
	{
		return new PendingWebhookCreateRequest($this, ['input' => $input]);
	}
	
	public function webhookUpdateMutation(WebhookUpdateInput $input, string $id): PendingWebhookUpdateRequest
	{
		return new PendingWebhookUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function webhookDeleteMutation(string $id): PendingWebhookDeleteRequest
	{
		return new PendingWebhookDeleteRequest($this, ['id' => $id]);
	}
	
	public function workflowStateCreateMutation(WorkflowStateCreateInput $input): PendingWorkflowStateCreateRequest
	{
		return new PendingWorkflowStateCreateRequest($this, ['input' => $input]);
	}
	
	public function workflowStateUpdateMutation(WorkflowStateUpdateInput $input, string $id): PendingWorkflowStateUpdateRequest
	{
		return new PendingWorkflowStateUpdateRequest($this, ['input' => $input, 'id' => $id]);
	}
	
	public function workflowStateArchiveMutation(string $id): PendingWorkflowStateArchiveRequest
	{
		return new PendingWorkflowStateArchiveRequest($this, ['id' => $id]);
	}
}
