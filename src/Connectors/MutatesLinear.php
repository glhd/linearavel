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
use Glhd\Linearavel\Requests\Inputs\OnboardingCustomerSurveyInput;
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
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAirbyteIntegrationConnectMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingApiKeyCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingApiKeyDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentArchiveMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkDiscordMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkFrontMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkGitHubIssueMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkGitHubPRMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkGitLabMRMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkIntercomMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkJiraIssueMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkSlackMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkURLMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentLinkZendeskMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentUnsyncSlackMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingAttachmentUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCommentCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCommentDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCommentResolveMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCommentUnresolveMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCommentUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingContactCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingContactSalesCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCreateCsvExportReportMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCreateOrganizationFromOnboardingMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCreateProjectUpdateReminderMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCustomViewCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCustomViewDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCustomViewUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCycleArchiveMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCycleCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCycleShiftAllMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingCycleUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingDocumentCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingDocumentDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingDocumentUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingEmailIntakeAddressCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingEmailIntakeAddressDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingEmailIntakeAddressRotateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingEmailIntakeAddressUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingEmailTokenUserAccountAuthMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingEmailUnsubscribeMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingEmailUserAccountAuthChallengeMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingEmojiCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingEmojiDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingFavoriteCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingFavoriteDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingFavoriteUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingFileUploadMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingGitAutomationStateCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingGitAutomationStateDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingGitAutomationStateUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingGitAutomationTargetBranchCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingGitAutomationTargetBranchDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingGitAutomationTargetBranchUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingGoogleUserAccountAuthMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingImageUploadFromUrlMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingImportFileUploadMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingInitiativeArchiveMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingInitiativeCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingInitiativeDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingInitiativeToProjectCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingInitiativeToProjectDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingInitiativeToProjectUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingInitiativeUnarchiveMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingInitiativeUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationArchiveMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationAsksConnectChannelMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationDiscordMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationFigmaMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationFrontMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationGithubCommitCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationGithubConnectMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationGitHubPersonalMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationGitlabConnectMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationGoogleCalendarPersonalConnectMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationGoogleSheetsMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationIntercomDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationIntercomMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationIntercomSettingsUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationJiraPersonalMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationJiraUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationLoomMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationOpsgenieConnectMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationOpsgenieRefreshScheduleMappingsMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationPagerDutyConnectMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationPagerDutyRefreshScheduleMappingsMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationRequestMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationSentryConnectMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationSettingsUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationSlackAsksMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationSlackImportEmojisMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationSlackMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationSlackOrgProjectUpdatesPostMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationSlackPersonalMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationSlackPostMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationSlackProjectPostMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationsSettingsCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationsSettingsUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationTemplateCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationTemplateDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationUpdateSlackMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIntegrationZendeskMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueAddLabelMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueArchiveMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueBatchUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueDescriptionUpdateFromFrontMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueImportCreateAsanaMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueImportCreateClubhouseMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueImportCreateCSVJiraMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueImportCreateGithubMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueImportCreateJiraMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueImportDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueImportProcessMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueImportUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueLabelCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueLabelDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueLabelUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueRelationCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueRelationDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueRelationUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueReminderMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueRemoveLabelMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueSubscribeMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueUnarchiveMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueUnsubscribeMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingIssueUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingJiraIntegrationConnectMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingJoinOrganizationFromOnboardingMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingLeaveOrganizationMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingLogoutAllSessionsMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingLogoutMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingLogoutOtherSessionsMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingLogoutSessionMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationArchiveAllMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationArchiveMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationMarkReadAllMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationMarkUnreadAllMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationSnoozeAllMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationSubscriptionCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationSubscriptionDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationSubscriptionUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationUnarchiveMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationUnsnoozeAllMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingNotificationUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationCancelDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationDeleteChallengeMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationDomainClaimMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationDomainCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationDomainDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationDomainVerifyMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationInviteCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationInviteDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationInviteUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationStartPlusTrialMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingOrganizationUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectArchiveMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectLinkCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectLinkDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectLinkUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectMilestoneCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectMilestoneDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectMilestoneUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectUnarchiveMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectUpdateCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectUpdateDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectUpdateInteractionCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectUpdateMarkAsReadMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingProjectUpdateUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingPushSubscriptionCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingPushSubscriptionDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingReactionCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingReactionDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingRefreshGoogleSheetsDataMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingResendOrganizationInviteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingRoadmapArchiveMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingRoadmapCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingRoadmapDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingRoadmapToProjectCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingRoadmapToProjectDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingRoadmapToProjectUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingRoadmapUnarchiveMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingRoadmapUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingSamlTokenUserAccountAuthMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTeamCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTeamCyclesDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTeamDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTeamKeyDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTeamMembershipCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTeamMembershipDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTeamMembershipUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTeamUnarchiveMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTeamUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTemplateCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTemplateDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTemplateUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTimeScheduleCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTimeScheduleDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTimeScheduleRefreshIntegrationScheduleMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTimeScheduleUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTimeScheduleUpsertExternalMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTriageResponsibilityCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTriageResponsibilityDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingTriageResponsibilityUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserDemoteAdminMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserDemoteMemberMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserDiscordConnectMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserExternalUserDisconnectMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserFlagUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserPromoteAdminMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserPromoteMemberMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserSettingsFlagIncrementMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserSettingsFlagsResetMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserSettingsUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserSuspendMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserUnsuspendMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingUserUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingViewPreferencesCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingViewPreferencesDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingViewPreferencesUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingWebhookCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingWebhookDeleteMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingWebhookUpdateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingWorkflowStateArchiveMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingWorkflowStateCreateMutationRequest;
use Glhd\Linearavel\Requests\Pending\Mutations\PendingWorkflowStateUpdateMutationRequest;

trait MutatesLinear
{
	public function apiKeyCreateMutation(ApiKeyCreateInput $input): PendingApiKeyCreateMutationRequest
	{
		return new PendingApiKeyCreateMutationRequest($this, ['input' => $input]);
	}

	public function apiKeyDeleteMutation(string $id): PendingApiKeyDeleteMutationRequest
	{
		return new PendingApiKeyDeleteMutationRequest($this, ['id' => $id]);
	}

	public function attachmentCreateMutation(AttachmentCreateInput $input): PendingAttachmentCreateMutationRequest
	{
		return new PendingAttachmentCreateMutationRequest($this, ['input' => $input]);
	}

	public function attachmentUpdateMutation(AttachmentUpdateInput $input, string $id): PendingAttachmentUpdateMutationRequest
	{
		return new PendingAttachmentUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function attachmentUnsyncSlackMutation(string $id): PendingAttachmentUnsyncSlackMutationRequest
	{
		return new PendingAttachmentUnsyncSlackMutationRequest($this, ['id' => $id]);
	}

	public function attachmentLinkURLMutation(string $url, string $issueId, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $id = null): PendingAttachmentLinkURLMutationRequest
	{
		return new PendingAttachmentLinkURLMutationRequest($this, ['url' => $url, 'issueId' => $issueId, 'createAsUser' => $createAsUser, 'displayIconUrl' => $displayIconUrl, 'title' => $title, 'id' => $id]);
	}

	public function attachmentLinkGitLabMRMutation(string $issueId, string $url, string $projectPathWithNamespace, float $number, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $id = null): PendingAttachmentLinkGitLabMRMutationRequest
	{
		return new PendingAttachmentLinkGitLabMRMutationRequest($this, ['issueId' => $issueId, 'url' => $url, 'projectPathWithNamespace' => $projectPathWithNamespace, 'number' => $number, 'createAsUser' => $createAsUser, 'displayIconUrl' => $displayIconUrl, 'title' => $title, 'id' => $id]);
	}

	public function attachmentLinkGitHubIssueMutation(string $issueId, string $url, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $id = null): PendingAttachmentLinkGitHubIssueMutationRequest
	{
		return new PendingAttachmentLinkGitHubIssueMutationRequest($this, ['issueId' => $issueId, 'url' => $url, 'createAsUser' => $createAsUser, 'displayIconUrl' => $displayIconUrl, 'title' => $title, 'id' => $id]);
	}

	public function attachmentLinkGitHubPRMutation(string $issueId, string $url, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $id = null, ?string $owner = null, ?string $repo = null, ?float $number = null): PendingAttachmentLinkGitHubPRMutationRequest
	{
		return new PendingAttachmentLinkGitHubPRMutationRequest($this, ['issueId' => $issueId, 'url' => $url, 'createAsUser' => $createAsUser, 'displayIconUrl' => $displayIconUrl, 'title' => $title, 'id' => $id, 'owner' => $owner, 'repo' => $repo, 'number' => $number]);
	}

	public function attachmentLinkZendeskMutation(string $ticketId, string $issueId, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $id = null): PendingAttachmentLinkZendeskMutationRequest
	{
		return new PendingAttachmentLinkZendeskMutationRequest($this, ['ticketId' => $ticketId, 'issueId' => $issueId, 'createAsUser' => $createAsUser, 'displayIconUrl' => $displayIconUrl, 'title' => $title, 'id' => $id]);
	}

	public function attachmentLinkDiscordMutation(string $issueId, string $channelId, string $messageId, string $url, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $id = null): PendingAttachmentLinkDiscordMutationRequest
	{
		return new PendingAttachmentLinkDiscordMutationRequest($this, ['issueId' => $issueId, 'channelId' => $channelId, 'messageId' => $messageId, 'url' => $url, 'createAsUser' => $createAsUser, 'displayIconUrl' => $displayIconUrl, 'title' => $title, 'id' => $id]);
	}

	public function attachmentLinkSlackMutation(string $channel, string $latest, string $issueId, string $url, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $ts = null, ?string $id = null): PendingAttachmentLinkSlackMutationRequest
	{
		return new PendingAttachmentLinkSlackMutationRequest($this, ['channel' => $channel, 'latest' => $latest, 'issueId' => $issueId, 'url' => $url, 'createAsUser' => $createAsUser, 'displayIconUrl' => $displayIconUrl, 'title' => $title, 'ts' => $ts, 'id' => $id]);
	}

	public function attachmentLinkFrontMutation(string $conversationId, string $issueId, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $id = null): PendingAttachmentLinkFrontMutationRequest
	{
		return new PendingAttachmentLinkFrontMutationRequest($this, ['conversationId' => $conversationId, 'issueId' => $issueId, 'createAsUser' => $createAsUser, 'displayIconUrl' => $displayIconUrl, 'title' => $title, 'id' => $id]);
	}

	public function attachmentLinkIntercomMutation(string $conversationId, string $issueId, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $id = null): PendingAttachmentLinkIntercomMutationRequest
	{
		return new PendingAttachmentLinkIntercomMutationRequest($this, ['conversationId' => $conversationId, 'issueId' => $issueId, 'createAsUser' => $createAsUser, 'displayIconUrl' => $displayIconUrl, 'title' => $title, 'id' => $id]);
	}

	public function attachmentLinkJiraIssueMutation(string $issueId, string $jiraIssueId): PendingAttachmentLinkJiraIssueMutationRequest
	{
		return new PendingAttachmentLinkJiraIssueMutationRequest($this, ['issueId' => $issueId, 'jiraIssueId' => $jiraIssueId]);
	}

	public function attachmentArchiveMutation(string $id): PendingAttachmentArchiveMutationRequest
	{
		return new PendingAttachmentArchiveMutationRequest($this, ['id' => $id]);
	}

	public function attachmentDeleteMutation(string $id): PendingAttachmentDeleteMutationRequest
	{
		return new PendingAttachmentDeleteMutationRequest($this, ['id' => $id]);
	}

	public function emailUserAccountAuthChallengeMutation(EmailUserAccountAuthChallengeInput $input): PendingEmailUserAccountAuthChallengeMutationRequest
	{
		return new PendingEmailUserAccountAuthChallengeMutationRequest($this, ['input' => $input]);
	}

	public function emailTokenUserAccountAuthMutation(TokenUserAccountAuthInput $input): PendingEmailTokenUserAccountAuthMutationRequest
	{
		return new PendingEmailTokenUserAccountAuthMutationRequest($this, ['input' => $input]);
	}

	public function samlTokenUserAccountAuthMutation(TokenUserAccountAuthInput $input): PendingSamlTokenUserAccountAuthMutationRequest
	{
		return new PendingSamlTokenUserAccountAuthMutationRequest($this, ['input' => $input]);
	}

	public function googleUserAccountAuthMutation(GoogleUserAccountAuthInput $input): PendingGoogleUserAccountAuthMutationRequest
	{
		return new PendingGoogleUserAccountAuthMutationRequest($this, ['input' => $input]);
	}

	public function createOrganizationFromOnboardingMutation(CreateOrganizationInput $input, ?OnboardingCustomerSurveyInput $survey = null): PendingCreateOrganizationFromOnboardingMutationRequest
	{
		return new PendingCreateOrganizationFromOnboardingMutationRequest($this, ['input' => $input, 'survey' => $survey]);
	}

	public function joinOrganizationFromOnboardingMutation(JoinOrganizationInput $input): PendingJoinOrganizationFromOnboardingMutationRequest
	{
		return new PendingJoinOrganizationFromOnboardingMutationRequest($this, ['input' => $input]);
	}

	public function leaveOrganizationMutation(string $organizationId): PendingLeaveOrganizationMutationRequest
	{
		return new PendingLeaveOrganizationMutationRequest($this, ['organizationId' => $organizationId]);
	}

	public function logoutMutation(): PendingLogoutMutationRequest
	{
		return new PendingLogoutMutationRequest($this, []);
	}

	public function logoutSessionMutation(string $sessionId): PendingLogoutSessionMutationRequest
	{
		return new PendingLogoutSessionMutationRequest($this, ['sessionId' => $sessionId]);
	}

	public function logoutAllSessionsMutation(): PendingLogoutAllSessionsMutationRequest
	{
		return new PendingLogoutAllSessionsMutationRequest($this, []);
	}

	public function logoutOtherSessionsMutation(): PendingLogoutOtherSessionsMutationRequest
	{
		return new PendingLogoutOtherSessionsMutationRequest($this, []);
	}

	public function commentCreateMutation(CommentCreateInput $input): PendingCommentCreateMutationRequest
	{
		return new PendingCommentCreateMutationRequest($this, ['input' => $input]);
	}

	public function commentUpdateMutation(CommentUpdateInput $input, string $id): PendingCommentUpdateMutationRequest
	{
		return new PendingCommentUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function commentDeleteMutation(string $id): PendingCommentDeleteMutationRequest
	{
		return new PendingCommentDeleteMutationRequest($this, ['id' => $id]);
	}

	public function commentResolveMutation(string $id, ?string $resolvingCommentId = null): PendingCommentResolveMutationRequest
	{
		return new PendingCommentResolveMutationRequest($this, ['id' => $id, 'resolvingCommentId' => $resolvingCommentId]);
	}

	public function commentUnresolveMutation(string $id): PendingCommentUnresolveMutationRequest
	{
		return new PendingCommentUnresolveMutationRequest($this, ['id' => $id]);
	}

	public function contactCreateMutation(ContactCreateInput $input): PendingContactCreateMutationRequest
	{
		return new PendingContactCreateMutationRequest($this, ['input' => $input]);
	}

	public function contactSalesCreateMutation(ContactSalesCreateInput $input): PendingContactSalesCreateMutationRequest
	{
		return new PendingContactSalesCreateMutationRequest($this, ['input' => $input]);
	}

	public function customViewCreateMutation(CustomViewCreateInput $input): PendingCustomViewCreateMutationRequest
	{
		return new PendingCustomViewCreateMutationRequest($this, ['input' => $input]);
	}

	public function customViewUpdateMutation(CustomViewUpdateInput $input, string $id): PendingCustomViewUpdateMutationRequest
	{
		return new PendingCustomViewUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function customViewDeleteMutation(string $id): PendingCustomViewDeleteMutationRequest
	{
		return new PendingCustomViewDeleteMutationRequest($this, ['id' => $id]);
	}

	public function cycleCreateMutation(CycleCreateInput $input): PendingCycleCreateMutationRequest
	{
		return new PendingCycleCreateMutationRequest($this, ['input' => $input]);
	}

	public function cycleUpdateMutation(CycleUpdateInput $input, string $id): PendingCycleUpdateMutationRequest
	{
		return new PendingCycleUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function cycleArchiveMutation(string $id): PendingCycleArchiveMutationRequest
	{
		return new PendingCycleArchiveMutationRequest($this, ['id' => $id]);
	}

	public function cycleShiftAllMutation(CycleShiftAllInput $input): PendingCycleShiftAllMutationRequest
	{
		return new PendingCycleShiftAllMutationRequest($this, ['input' => $input]);
	}

	public function documentCreateMutation(DocumentCreateInput $input): PendingDocumentCreateMutationRequest
	{
		return new PendingDocumentCreateMutationRequest($this, ['input' => $input]);
	}

	public function documentUpdateMutation(DocumentUpdateInput $input, string $id): PendingDocumentUpdateMutationRequest
	{
		return new PendingDocumentUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function documentDeleteMutation(string $id): PendingDocumentDeleteMutationRequest
	{
		return new PendingDocumentDeleteMutationRequest($this, ['id' => $id]);
	}

	public function emailIntakeAddressCreateMutation(EmailIntakeAddressCreateInput $input): PendingEmailIntakeAddressCreateMutationRequest
	{
		return new PendingEmailIntakeAddressCreateMutationRequest($this, ['input' => $input]);
	}

	public function emailIntakeAddressRotateMutation(string $id): PendingEmailIntakeAddressRotateMutationRequest
	{
		return new PendingEmailIntakeAddressRotateMutationRequest($this, ['id' => $id]);
	}

	public function emailIntakeAddressUpdateMutation(EmailIntakeAddressUpdateInput $input, string $id): PendingEmailIntakeAddressUpdateMutationRequest
	{
		return new PendingEmailIntakeAddressUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function emailIntakeAddressDeleteMutation(string $id): PendingEmailIntakeAddressDeleteMutationRequest
	{
		return new PendingEmailIntakeAddressDeleteMutationRequest($this, ['id' => $id]);
	}

	public function emailUnsubscribeMutation(EmailUnsubscribeInput $input): PendingEmailUnsubscribeMutationRequest
	{
		return new PendingEmailUnsubscribeMutationRequest($this, ['input' => $input]);
	}

	public function emojiCreateMutation(EmojiCreateInput $input): PendingEmojiCreateMutationRequest
	{
		return new PendingEmojiCreateMutationRequest($this, ['input' => $input]);
	}

	public function emojiDeleteMutation(string $id): PendingEmojiDeleteMutationRequest
	{
		return new PendingEmojiDeleteMutationRequest($this, ['id' => $id]);
	}

	public function initiativeToProjectCreateMutation(InitiativeToProjectCreateInput $input): PendingInitiativeToProjectCreateMutationRequest
	{
		return new PendingInitiativeToProjectCreateMutationRequest($this, ['input' => $input]);
	}

	public function initiativeToProjectUpdateMutation(InitiativeToProjectUpdateInput $input, string $id): PendingInitiativeToProjectUpdateMutationRequest
	{
		return new PendingInitiativeToProjectUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function initiativeToProjectDeleteMutation(string $id): PendingInitiativeToProjectDeleteMutationRequest
	{
		return new PendingInitiativeToProjectDeleteMutationRequest($this, ['id' => $id]);
	}

	public function initiativeCreateMutation(InitiativeCreateInput $input): PendingInitiativeCreateMutationRequest
	{
		return new PendingInitiativeCreateMutationRequest($this, ['input' => $input]);
	}

	public function initiativeUpdateMutation(InitiativeUpdateInput $input, string $id): PendingInitiativeUpdateMutationRequest
	{
		return new PendingInitiativeUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function initiativeArchiveMutation(string $id): PendingInitiativeArchiveMutationRequest
	{
		return new PendingInitiativeArchiveMutationRequest($this, ['id' => $id]);
	}

	public function initiativeUnarchiveMutation(string $id): PendingInitiativeUnarchiveMutationRequest
	{
		return new PendingInitiativeUnarchiveMutationRequest($this, ['id' => $id]);
	}

	public function initiativeDeleteMutation(string $id): PendingInitiativeDeleteMutationRequest
	{
		return new PendingInitiativeDeleteMutationRequest($this, ['id' => $id]);
	}

	public function favoriteCreateMutation(FavoriteCreateInput $input): PendingFavoriteCreateMutationRequest
	{
		return new PendingFavoriteCreateMutationRequest($this, ['input' => $input]);
	}

	public function favoriteUpdateMutation(FavoriteUpdateInput $input, string $id): PendingFavoriteUpdateMutationRequest
	{
		return new PendingFavoriteUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function favoriteDeleteMutation(string $id): PendingFavoriteDeleteMutationRequest
	{
		return new PendingFavoriteDeleteMutationRequest($this, ['id' => $id]);
	}

	public function fileUploadMutation(int $size, string $contentType, string $filename, ?string $metaData = null, ?bool $makePublic = null): PendingFileUploadMutationRequest
	{
		return new PendingFileUploadMutationRequest($this, ['size' => $size, 'contentType' => $contentType, 'filename' => $filename, 'metaData' => $metaData, 'makePublic' => $makePublic]);
	}

	public function importFileUploadMutation(int $size, string $contentType, string $filename, ?string $metaData = null): PendingImportFileUploadMutationRequest
	{
		return new PendingImportFileUploadMutationRequest($this, ['size' => $size, 'contentType' => $contentType, 'filename' => $filename, 'metaData' => $metaData]);
	}

	public function imageUploadFromUrlMutation(string $url): PendingImageUploadFromUrlMutationRequest
	{
		return new PendingImageUploadFromUrlMutationRequest($this, ['url' => $url]);
	}

	public function gitAutomationStateCreateMutation(GitAutomationStateCreateInput $input): PendingGitAutomationStateCreateMutationRequest
	{
		return new PendingGitAutomationStateCreateMutationRequest($this, ['input' => $input]);
	}

	public function gitAutomationStateUpdateMutation(GitAutomationStateUpdateInput $input, string $id): PendingGitAutomationStateUpdateMutationRequest
	{
		return new PendingGitAutomationStateUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function gitAutomationStateDeleteMutation(string $id): PendingGitAutomationStateDeleteMutationRequest
	{
		return new PendingGitAutomationStateDeleteMutationRequest($this, ['id' => $id]);
	}

	public function gitAutomationTargetBranchCreateMutation(GitAutomationTargetBranchCreateInput $input): PendingGitAutomationTargetBranchCreateMutationRequest
	{
		return new PendingGitAutomationTargetBranchCreateMutationRequest($this, ['input' => $input]);
	}

	public function gitAutomationTargetBranchUpdateMutation(GitAutomationTargetBranchUpdateInput $input, string $id): PendingGitAutomationTargetBranchUpdateMutationRequest
	{
		return new PendingGitAutomationTargetBranchUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function gitAutomationTargetBranchDeleteMutation(string $id): PendingGitAutomationTargetBranchDeleteMutationRequest
	{
		return new PendingGitAutomationTargetBranchDeleteMutationRequest($this, ['id' => $id]);
	}

	public function integrationRequestMutation(IntegrationRequestInput $input): PendingIntegrationRequestMutationRequest
	{
		return new PendingIntegrationRequestMutationRequest($this, ['input' => $input]);
	}

	public function integrationSettingsUpdateMutation(IntegrationSettingsInput $input, string $id): PendingIntegrationSettingsUpdateMutationRequest
	{
		return new PendingIntegrationSettingsUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function integrationGithubCommitCreateMutation(): PendingIntegrationGithubCommitCreateMutationRequest
	{
		return new PendingIntegrationGithubCommitCreateMutationRequest($this, []);
	}

	public function integrationGithubConnectMutation(string $installationId): PendingIntegrationGithubConnectMutationRequest
	{
		return new PendingIntegrationGithubConnectMutationRequest($this, ['installationId' => $installationId]);
	}

	public function integrationGitlabConnectMutation(string $gitlabUrl, string $accessToken): PendingIntegrationGitlabConnectMutationRequest
	{
		return new PendingIntegrationGitlabConnectMutationRequest($this, ['gitlabUrl' => $gitlabUrl, 'accessToken' => $accessToken]);
	}

	public function airbyteIntegrationConnectMutation(AirbyteConfigurationInput $input): PendingAirbyteIntegrationConnectMutationRequest
	{
		return new PendingAirbyteIntegrationConnectMutationRequest($this, ['input' => $input]);
	}

	public function integrationGoogleCalendarPersonalConnectMutation(string $code): PendingIntegrationGoogleCalendarPersonalConnectMutationRequest
	{
		return new PendingIntegrationGoogleCalendarPersonalConnectMutationRequest($this, ['code' => $code]);
	}

	public function jiraIntegrationConnectMutation(JiraConfigurationInput $input): PendingJiraIntegrationConnectMutationRequest
	{
		return new PendingJiraIntegrationConnectMutationRequest($this, ['input' => $input]);
	}

	public function integrationJiraUpdateMutation(JiraUpdateInput $input): PendingIntegrationJiraUpdateMutationRequest
	{
		return new PendingIntegrationJiraUpdateMutationRequest($this, ['input' => $input]);
	}

	public function integrationJiraPersonalMutation(?string $code = null, ?string $accessToken = null): PendingIntegrationJiraPersonalMutationRequest
	{
		return new PendingIntegrationJiraPersonalMutationRequest($this, ['code' => $code, 'accessToken' => $accessToken]);
	}

	public function integrationGitHubPersonalMutation(string $code): PendingIntegrationGitHubPersonalMutationRequest
	{
		return new PendingIntegrationGitHubPersonalMutationRequest($this, ['code' => $code]);
	}

	public function integrationIntercomMutation(string $redirectUri, string $code, ?string $domainUrl = null): PendingIntegrationIntercomMutationRequest
	{
		return new PendingIntegrationIntercomMutationRequest($this, ['redirectUri' => $redirectUri, 'code' => $code, 'domainUrl' => $domainUrl]);
	}

	public function integrationIntercomDeleteMutation(): PendingIntegrationIntercomDeleteMutationRequest
	{
		return new PendingIntegrationIntercomDeleteMutationRequest($this, []);
	}

	public function integrationIntercomSettingsUpdateMutation(IntercomSettingsInput $input): PendingIntegrationIntercomSettingsUpdateMutationRequest
	{
		return new PendingIntegrationIntercomSettingsUpdateMutationRequest($this, ['input' => $input]);
	}

	public function integrationDiscordMutation(string $redirectUri, string $code): PendingIntegrationDiscordMutationRequest
	{
		return new PendingIntegrationDiscordMutationRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}

	public function integrationOpsgenieConnectMutation(string $apiKey): PendingIntegrationOpsgenieConnectMutationRequest
	{
		return new PendingIntegrationOpsgenieConnectMutationRequest($this, ['apiKey' => $apiKey]);
	}

	public function integrationOpsgenieRefreshScheduleMappingsMutation(): PendingIntegrationOpsgenieRefreshScheduleMappingsMutationRequest
	{
		return new PendingIntegrationOpsgenieRefreshScheduleMappingsMutationRequest($this, []);
	}

	public function integrationPagerDutyConnectMutation(string $code, string $redirectUri): PendingIntegrationPagerDutyConnectMutationRequest
	{
		return new PendingIntegrationPagerDutyConnectMutationRequest($this, ['code' => $code, 'redirectUri' => $redirectUri]);
	}

	public function integrationPagerDutyRefreshScheduleMappingsMutation(): PendingIntegrationPagerDutyRefreshScheduleMappingsMutationRequest
	{
		return new PendingIntegrationPagerDutyRefreshScheduleMappingsMutationRequest($this, []);
	}

	public function integrationUpdateSlackMutation(string $redirectUri, string $code): PendingIntegrationUpdateSlackMutationRequest
	{
		return new PendingIntegrationUpdateSlackMutationRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}

	public function integrationSlackMutation(string $redirectUri, string $code, ?bool $shouldUseV2Auth = null): PendingIntegrationSlackMutationRequest
	{
		return new PendingIntegrationSlackMutationRequest($this, ['redirectUri' => $redirectUri, 'code' => $code, 'shouldUseV2Auth' => $shouldUseV2Auth]);
	}

	public function integrationSlackAsksMutation(string $redirectUri, string $code): PendingIntegrationSlackAsksMutationRequest
	{
		return new PendingIntegrationSlackAsksMutationRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}

	public function integrationSlackPersonalMutation(string $redirectUri, string $code): PendingIntegrationSlackPersonalMutationRequest
	{
		return new PendingIntegrationSlackPersonalMutationRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}

	public function integrationAsksConnectChannelMutation(string $redirectUri, string $code): PendingIntegrationAsksConnectChannelMutationRequest
	{
		return new PendingIntegrationAsksConnectChannelMutationRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}

	public function integrationSlackPostMutation(string $redirectUri, string $teamId, string $code, ?bool $shouldUseV2Auth = null): PendingIntegrationSlackPostMutationRequest
	{
		return new PendingIntegrationSlackPostMutationRequest($this, ['redirectUri' => $redirectUri, 'teamId' => $teamId, 'code' => $code, 'shouldUseV2Auth' => $shouldUseV2Auth]);
	}

	public function integrationSlackProjectPostMutation(string $service, string $redirectUri, string $projectId, string $code): PendingIntegrationSlackProjectPostMutationRequest
	{
		return new PendingIntegrationSlackProjectPostMutationRequest($this, ['service' => $service, 'redirectUri' => $redirectUri, 'projectId' => $projectId, 'code' => $code]);
	}

	public function integrationSlackOrgProjectUpdatesPostMutation(string $redirectUri, string $code): PendingIntegrationSlackOrgProjectUpdatesPostMutationRequest
	{
		return new PendingIntegrationSlackOrgProjectUpdatesPostMutationRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}

	public function integrationSlackImportEmojisMutation(string $redirectUri, string $code): PendingIntegrationSlackImportEmojisMutationRequest
	{
		return new PendingIntegrationSlackImportEmojisMutationRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}

	public function integrationFigmaMutation(string $redirectUri, string $code): PendingIntegrationFigmaMutationRequest
	{
		return new PendingIntegrationFigmaMutationRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}

	public function integrationGoogleSheetsMutation(string $code): PendingIntegrationGoogleSheetsMutationRequest
	{
		return new PendingIntegrationGoogleSheetsMutationRequest($this, ['code' => $code]);
	}

	public function refreshGoogleSheetsDataMutation(string $id): PendingRefreshGoogleSheetsDataMutationRequest
	{
		return new PendingRefreshGoogleSheetsDataMutationRequest($this, ['id' => $id]);
	}

	public function integrationSentryConnectMutation(string $organizationSlug, string $code, string $installationId): PendingIntegrationSentryConnectMutationRequest
	{
		return new PendingIntegrationSentryConnectMutationRequest($this, ['organizationSlug' => $organizationSlug, 'code' => $code, 'installationId' => $installationId]);
	}

	public function integrationFrontMutation(string $redirectUri, string $code): PendingIntegrationFrontMutationRequest
	{
		return new PendingIntegrationFrontMutationRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}

	public function integrationZendeskMutation(string $subdomain, string $code, string $scope, string $redirectUri): PendingIntegrationZendeskMutationRequest
	{
		return new PendingIntegrationZendeskMutationRequest($this, ['subdomain' => $subdomain, 'code' => $code, 'scope' => $scope, 'redirectUri' => $redirectUri]);
	}

	public function integrationLoomMutation(): PendingIntegrationLoomMutationRequest
	{
		return new PendingIntegrationLoomMutationRequest($this, []);
	}

	public function integrationDeleteMutation(string $id): PendingIntegrationDeleteMutationRequest
	{
		return new PendingIntegrationDeleteMutationRequest($this, ['id' => $id]);
	}

	public function integrationArchiveMutation(string $id): PendingIntegrationArchiveMutationRequest
	{
		return new PendingIntegrationArchiveMutationRequest($this, ['id' => $id]);
	}

	public function integrationsSettingsCreateMutation(IntegrationsSettingsCreateInput $input): PendingIntegrationsSettingsCreateMutationRequest
	{
		return new PendingIntegrationsSettingsCreateMutationRequest($this, ['input' => $input]);
	}

	public function integrationsSettingsUpdateMutation(IntegrationsSettingsUpdateInput $input, string $id): PendingIntegrationsSettingsUpdateMutationRequest
	{
		return new PendingIntegrationsSettingsUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function integrationTemplateCreateMutation(IntegrationTemplateCreateInput $input): PendingIntegrationTemplateCreateMutationRequest
	{
		return new PendingIntegrationTemplateCreateMutationRequest($this, ['input' => $input]);
	}

	public function integrationTemplateDeleteMutation(string $id): PendingIntegrationTemplateDeleteMutationRequest
	{
		return new PendingIntegrationTemplateDeleteMutationRequest($this, ['id' => $id]);
	}

	public function issueImportCreateGithubMutation(string $githubToken, string $githubRepoName, string $githubRepoOwner, ?string $organizationId = null, ?string $teamId = null, ?string $teamName = null, ?bool $githubShouldImportOrgProjects = null, ?bool $instantProcess = null, ?bool $includeClosedIssues = null, ?string $id = null): PendingIssueImportCreateGithubMutationRequest
	{
		return new PendingIssueImportCreateGithubMutationRequest($this, ['githubToken' => $githubToken, 'githubRepoName' => $githubRepoName, 'githubRepoOwner' => $githubRepoOwner, 'organizationId' => $organizationId, 'teamId' => $teamId, 'teamName' => $teamName, 'githubShouldImportOrgProjects' => $githubShouldImportOrgProjects, 'instantProcess' => $instantProcess, 'includeClosedIssues' => $includeClosedIssues, 'id' => $id]);
	}

	public function issueImportCreateJiraMutation(string $jiraToken, string $jiraProject, string $jiraEmail, string $jiraHostname, ?string $organizationId = null, ?string $teamId = null, ?string $teamName = null, ?bool $instantProcess = null, ?bool $includeClosedIssues = null, ?string $id = null): PendingIssueImportCreateJiraMutationRequest
	{
		return new PendingIssueImportCreateJiraMutationRequest($this, ['jiraToken' => $jiraToken, 'jiraProject' => $jiraProject, 'jiraEmail' => $jiraEmail, 'jiraHostname' => $jiraHostname, 'organizationId' => $organizationId, 'teamId' => $teamId, 'teamName' => $teamName, 'instantProcess' => $instantProcess, 'includeClosedIssues' => $includeClosedIssues, 'id' => $id]);
	}

	public function issueImportCreateCSVJiraMutation(string $csvUrl, ?string $organizationId = null, ?string $teamId = null, ?string $teamName = null, ?string $jiraHostname = null, ?string $jiraToken = null, ?string $jiraEmail = null): PendingIssueImportCreateCSVJiraMutationRequest
	{
		return new PendingIssueImportCreateCSVJiraMutationRequest($this, ['csvUrl' => $csvUrl, 'organizationId' => $organizationId, 'teamId' => $teamId, 'teamName' => $teamName, 'jiraHostname' => $jiraHostname, 'jiraToken' => $jiraToken, 'jiraEmail' => $jiraEmail]);
	}

	public function issueImportCreateClubhouseMutation(string $clubhouseToken, string $clubhouseGroupName, ?string $organizationId = null, ?string $teamId = null, ?string $teamName = null, ?bool $instantProcess = null, ?bool $includeClosedIssues = null, ?string $id = null): PendingIssueImportCreateClubhouseMutationRequest
	{
		return new PendingIssueImportCreateClubhouseMutationRequest($this, ['clubhouseToken' => $clubhouseToken, 'clubhouseGroupName' => $clubhouseGroupName, 'organizationId' => $organizationId, 'teamId' => $teamId, 'teamName' => $teamName, 'instantProcess' => $instantProcess, 'includeClosedIssues' => $includeClosedIssues, 'id' => $id]);
	}

	public function issueImportCreateAsanaMutation(string $asanaToken, string $asanaTeamName, ?string $organizationId = null, ?string $teamId = null, ?string $teamName = null, ?bool $instantProcess = null, ?bool $includeClosedIssues = null, ?string $id = null): PendingIssueImportCreateAsanaMutationRequest
	{
		return new PendingIssueImportCreateAsanaMutationRequest($this, ['asanaToken' => $asanaToken, 'asanaTeamName' => $asanaTeamName, 'organizationId' => $organizationId, 'teamId' => $teamId, 'teamName' => $teamName, 'instantProcess' => $instantProcess, 'includeClosedIssues' => $includeClosedIssues, 'id' => $id]);
	}

	public function issueImportDeleteMutation(string $issueImportId): PendingIssueImportDeleteMutationRequest
	{
		return new PendingIssueImportDeleteMutationRequest($this, ['issueImportId' => $issueImportId]);
	}

	public function issueImportProcessMutation(string $mapping, string $issueImportId): PendingIssueImportProcessMutationRequest
	{
		return new PendingIssueImportProcessMutationRequest($this, ['mapping' => $mapping, 'issueImportId' => $issueImportId]);
	}

	public function issueImportUpdateMutation(IssueImportUpdateInput $input, string $id): PendingIssueImportUpdateMutationRequest
	{
		return new PendingIssueImportUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function issueLabelCreateMutation(IssueLabelCreateInput $input, ?bool $replaceTeamLabels = null): PendingIssueLabelCreateMutationRequest
	{
		return new PendingIssueLabelCreateMutationRequest($this, ['input' => $input, 'replaceTeamLabels' => $replaceTeamLabels]);
	}

	public function issueLabelUpdateMutation(IssueLabelUpdateInput $input, string $id): PendingIssueLabelUpdateMutationRequest
	{
		return new PendingIssueLabelUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function issueLabelDeleteMutation(string $id): PendingIssueLabelDeleteMutationRequest
	{
		return new PendingIssueLabelDeleteMutationRequest($this, ['id' => $id]);
	}

	public function issueRelationCreateMutation(IssueRelationCreateInput $input): PendingIssueRelationCreateMutationRequest
	{
		return new PendingIssueRelationCreateMutationRequest($this, ['input' => $input]);
	}

	public function issueRelationUpdateMutation(IssueRelationUpdateInput $input, string $id): PendingIssueRelationUpdateMutationRequest
	{
		return new PendingIssueRelationUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function issueRelationDeleteMutation(string $id): PendingIssueRelationDeleteMutationRequest
	{
		return new PendingIssueRelationDeleteMutationRequest($this, ['id' => $id]);
	}

	public function issueCreateMutation(IssueCreateInput $input): PendingIssueCreateMutationRequest
	{
		return new PendingIssueCreateMutationRequest($this, ['input' => $input]);
	}

	public function issueUpdateMutation(IssueUpdateInput $input, string $id): PendingIssueUpdateMutationRequest
	{
		return new PendingIssueUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function issueBatchUpdateMutation(IssueUpdateInput $input, iterable $ids): PendingIssueBatchUpdateMutationRequest
	{
		return new PendingIssueBatchUpdateMutationRequest($this, ['input' => $input, 'ids' => $ids]);
	}

	public function issueArchiveMutation(string $id, ?bool $trash = null): PendingIssueArchiveMutationRequest
	{
		return new PendingIssueArchiveMutationRequest($this, ['id' => $id, 'trash' => $trash]);
	}

	public function issueUnarchiveMutation(string $id): PendingIssueUnarchiveMutationRequest
	{
		return new PendingIssueUnarchiveMutationRequest($this, ['id' => $id]);
	}

	public function issueDeleteMutation(string $id): PendingIssueDeleteMutationRequest
	{
		return new PendingIssueDeleteMutationRequest($this, ['id' => $id]);
	}

	public function issueAddLabelMutation(string $labelId, string $id): PendingIssueAddLabelMutationRequest
	{
		return new PendingIssueAddLabelMutationRequest($this, ['labelId' => $labelId, 'id' => $id]);
	}

	public function issueRemoveLabelMutation(string $labelId, string $id): PendingIssueRemoveLabelMutationRequest
	{
		return new PendingIssueRemoveLabelMutationRequest($this, ['labelId' => $labelId, 'id' => $id]);
	}

	public function issueReminderMutation(DateTimeInterface $reminderAt, string $id): PendingIssueReminderMutationRequest
	{
		return new PendingIssueReminderMutationRequest($this, ['reminderAt' => $reminderAt, 'id' => $id]);
	}

	public function issueSubscribeMutation(string $id, ?string $userId = null): PendingIssueSubscribeMutationRequest
	{
		return new PendingIssueSubscribeMutationRequest($this, ['id' => $id, 'userId' => $userId]);
	}

	public function issueUnsubscribeMutation(string $id, ?string $userId = null): PendingIssueUnsubscribeMutationRequest
	{
		return new PendingIssueUnsubscribeMutationRequest($this, ['id' => $id, 'userId' => $userId]);
	}

	public function issueDescriptionUpdateFromFrontMutation(string $description, string $id): PendingIssueDescriptionUpdateFromFrontMutationRequest
	{
		return new PendingIssueDescriptionUpdateFromFrontMutationRequest($this, ['description' => $description, 'id' => $id]);
	}

	public function notificationUpdateMutation(NotificationUpdateInput $input, string $id): PendingNotificationUpdateMutationRequest
	{
		return new PendingNotificationUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function notificationMarkReadAllMutation(DateTimeInterface $readAt, NotificationEntityInput $input): PendingNotificationMarkReadAllMutationRequest
	{
		return new PendingNotificationMarkReadAllMutationRequest($this, ['readAt' => $readAt, 'input' => $input]);
	}

	public function notificationMarkUnreadAllMutation(NotificationEntityInput $input): PendingNotificationMarkUnreadAllMutationRequest
	{
		return new PendingNotificationMarkUnreadAllMutationRequest($this, ['input' => $input]);
	}

	public function notificationSnoozeAllMutation(DateTimeInterface $snoozedUntilAt, NotificationEntityInput $input): PendingNotificationSnoozeAllMutationRequest
	{
		return new PendingNotificationSnoozeAllMutationRequest($this, ['snoozedUntilAt' => $snoozedUntilAt, 'input' => $input]);
	}

	public function notificationUnsnoozeAllMutation(DateTimeInterface $unsnoozedAt, NotificationEntityInput $input): PendingNotificationUnsnoozeAllMutationRequest
	{
		return new PendingNotificationUnsnoozeAllMutationRequest($this, ['unsnoozedAt' => $unsnoozedAt, 'input' => $input]);
	}

	public function notificationArchiveMutation(string $id): PendingNotificationArchiveMutationRequest
	{
		return new PendingNotificationArchiveMutationRequest($this, ['id' => $id]);
	}

	public function notificationArchiveAllMutation(NotificationEntityInput $input): PendingNotificationArchiveAllMutationRequest
	{
		return new PendingNotificationArchiveAllMutationRequest($this, ['input' => $input]);
	}

	public function notificationUnarchiveMutation(string $id): PendingNotificationUnarchiveMutationRequest
	{
		return new PendingNotificationUnarchiveMutationRequest($this, ['id' => $id]);
	}

	public function notificationSubscriptionCreateMutation(NotificationSubscriptionCreateInput $input): PendingNotificationSubscriptionCreateMutationRequest
	{
		return new PendingNotificationSubscriptionCreateMutationRequest($this, ['input' => $input]);
	}

	public function notificationSubscriptionUpdateMutation(NotificationSubscriptionUpdateInput $input, string $id): PendingNotificationSubscriptionUpdateMutationRequest
	{
		return new PendingNotificationSubscriptionUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function notificationSubscriptionDeleteMutation(string $id): PendingNotificationSubscriptionDeleteMutationRequest
	{
		return new PendingNotificationSubscriptionDeleteMutationRequest($this, ['id' => $id]);
	}

	public function organizationDomainClaimMutation(string $id): PendingOrganizationDomainClaimMutationRequest
	{
		return new PendingOrganizationDomainClaimMutationRequest($this, ['id' => $id]);
	}

	public function organizationDomainVerifyMutation(OrganizationDomainVerificationInput $input): PendingOrganizationDomainVerifyMutationRequest
	{
		return new PendingOrganizationDomainVerifyMutationRequest($this, ['input' => $input]);
	}

	public function organizationDomainCreateMutation(OrganizationDomainCreateInput $input, ?bool $triggerEmailVerification = null): PendingOrganizationDomainCreateMutationRequest
	{
		return new PendingOrganizationDomainCreateMutationRequest($this, ['input' => $input, 'triggerEmailVerification' => $triggerEmailVerification]);
	}

	public function organizationDomainDeleteMutation(string $id): PendingOrganizationDomainDeleteMutationRequest
	{
		return new PendingOrganizationDomainDeleteMutationRequest($this, ['id' => $id]);
	}

	public function organizationInviteCreateMutation(OrganizationInviteCreateInput $input): PendingOrganizationInviteCreateMutationRequest
	{
		return new PendingOrganizationInviteCreateMutationRequest($this, ['input' => $input]);
	}

	public function organizationInviteUpdateMutation(OrganizationInviteUpdateInput $input, string $id): PendingOrganizationInviteUpdateMutationRequest
	{
		return new PendingOrganizationInviteUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function resendOrganizationInviteMutation(string $id): PendingResendOrganizationInviteMutationRequest
	{
		return new PendingResendOrganizationInviteMutationRequest($this, ['id' => $id]);
	}

	public function organizationInviteDeleteMutation(string $id): PendingOrganizationInviteDeleteMutationRequest
	{
		return new PendingOrganizationInviteDeleteMutationRequest($this, ['id' => $id]);
	}

	public function organizationUpdateMutation(OrganizationUpdateInput $input): PendingOrganizationUpdateMutationRequest
	{
		return new PendingOrganizationUpdateMutationRequest($this, ['input' => $input]);
	}

	public function organizationDeleteChallengeMutation(): PendingOrganizationDeleteChallengeMutationRequest
	{
		return new PendingOrganizationDeleteChallengeMutationRequest($this, []);
	}

	public function organizationDeleteMutation(DeleteOrganizationInput $input): PendingOrganizationDeleteMutationRequest
	{
		return new PendingOrganizationDeleteMutationRequest($this, ['input' => $input]);
	}

	public function organizationCancelDeleteMutation(): PendingOrganizationCancelDeleteMutationRequest
	{
		return new PendingOrganizationCancelDeleteMutationRequest($this, []);
	}

	public function organizationStartPlusTrialMutation(): PendingOrganizationStartPlusTrialMutationRequest
	{
		return new PendingOrganizationStartPlusTrialMutationRequest($this, []);
	}

	public function projectLinkCreateMutation(ProjectLinkCreateInput $input): PendingProjectLinkCreateMutationRequest
	{
		return new PendingProjectLinkCreateMutationRequest($this, ['input' => $input]);
	}

	public function projectLinkUpdateMutation(ProjectLinkUpdateInput $input, string $id): PendingProjectLinkUpdateMutationRequest
	{
		return new PendingProjectLinkUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function projectLinkDeleteMutation(string $id): PendingProjectLinkDeleteMutationRequest
	{
		return new PendingProjectLinkDeleteMutationRequest($this, ['id' => $id]);
	}

	public function projectMilestoneCreateMutation(ProjectMilestoneCreateInput $input): PendingProjectMilestoneCreateMutationRequest
	{
		return new PendingProjectMilestoneCreateMutationRequest($this, ['input' => $input]);
	}

	public function projectMilestoneUpdateMutation(ProjectMilestoneUpdateInput $input, string $id): PendingProjectMilestoneUpdateMutationRequest
	{
		return new PendingProjectMilestoneUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function projectMilestoneDeleteMutation(string $id): PendingProjectMilestoneDeleteMutationRequest
	{
		return new PendingProjectMilestoneDeleteMutationRequest($this, ['id' => $id]);
	}

	public function projectCreateMutation(ProjectCreateInput $input, ?bool $connectSlackChannel = null): PendingProjectCreateMutationRequest
	{
		return new PendingProjectCreateMutationRequest($this, ['input' => $input, 'connectSlackChannel' => $connectSlackChannel]);
	}

	public function projectUpdateMutation(ProjectUpdateInput $input, string $id): PendingProjectUpdateMutationRequest
	{
		return new PendingProjectUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function projectDeleteMutation(string $id): PendingProjectDeleteMutationRequest
	{
		return new PendingProjectDeleteMutationRequest($this, ['id' => $id]);
	}

	public function projectArchiveMutation(string $id, ?bool $trash = null): PendingProjectArchiveMutationRequest
	{
		return new PendingProjectArchiveMutationRequest($this, ['id' => $id, 'trash' => $trash]);
	}

	public function projectUnarchiveMutation(string $id): PendingProjectUnarchiveMutationRequest
	{
		return new PendingProjectUnarchiveMutationRequest($this, ['id' => $id]);
	}

	public function projectUpdateInteractionCreateMutation(ProjectUpdateInteractionCreateInput $input): PendingProjectUpdateInteractionCreateMutationRequest
	{
		return new PendingProjectUpdateInteractionCreateMutationRequest($this, ['input' => $input]);
	}

	public function projectUpdateCreateMutation(ProjectUpdateCreateInput $input): PendingProjectUpdateCreateMutationRequest
	{
		return new PendingProjectUpdateCreateMutationRequest($this, ['input' => $input]);
	}

	public function projectUpdateUpdateMutation(ProjectUpdateUpdateInput $input, string $id): PendingProjectUpdateUpdateMutationRequest
	{
		return new PendingProjectUpdateUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function projectUpdateDeleteMutation(string $id): PendingProjectUpdateDeleteMutationRequest
	{
		return new PendingProjectUpdateDeleteMutationRequest($this, ['id' => $id]);
	}

	public function projectUpdateMarkAsReadMutation(string $id): PendingProjectUpdateMarkAsReadMutationRequest
	{
		return new PendingProjectUpdateMarkAsReadMutationRequest($this, ['id' => $id]);
	}

	public function createProjectUpdateReminderMutation(string $projectId, ?string $userId = null): PendingCreateProjectUpdateReminderMutationRequest
	{
		return new PendingCreateProjectUpdateReminderMutationRequest($this, ['projectId' => $projectId, 'userId' => $userId]);
	}

	public function pushSubscriptionCreateMutation(PushSubscriptionCreateInput $input): PendingPushSubscriptionCreateMutationRequest
	{
		return new PendingPushSubscriptionCreateMutationRequest($this, ['input' => $input]);
	}

	public function pushSubscriptionDeleteMutation(string $id): PendingPushSubscriptionDeleteMutationRequest
	{
		return new PendingPushSubscriptionDeleteMutationRequest($this, ['id' => $id]);
	}

	public function reactionCreateMutation(ReactionCreateInput $input): PendingReactionCreateMutationRequest
	{
		return new PendingReactionCreateMutationRequest($this, ['input' => $input]);
	}

	public function reactionDeleteMutation(string $id): PendingReactionDeleteMutationRequest
	{
		return new PendingReactionDeleteMutationRequest($this, ['id' => $id]);
	}

	public function createCsvExportReportMutation(?iterable $includePrivateTeamIds = null): PendingCreateCsvExportReportMutationRequest
	{
		return new PendingCreateCsvExportReportMutationRequest($this, ['includePrivateTeamIds' => $includePrivateTeamIds]);
	}

	public function roadmapCreateMutation(RoadmapCreateInput $input): PendingRoadmapCreateMutationRequest
	{
		return new PendingRoadmapCreateMutationRequest($this, ['input' => $input]);
	}

	public function roadmapUpdateMutation(RoadmapUpdateInput $input, string $id): PendingRoadmapUpdateMutationRequest
	{
		return new PendingRoadmapUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function roadmapArchiveMutation(string $id): PendingRoadmapArchiveMutationRequest
	{
		return new PendingRoadmapArchiveMutationRequest($this, ['id' => $id]);
	}

	public function roadmapUnarchiveMutation(string $id): PendingRoadmapUnarchiveMutationRequest
	{
		return new PendingRoadmapUnarchiveMutationRequest($this, ['id' => $id]);
	}

	public function roadmapDeleteMutation(string $id): PendingRoadmapDeleteMutationRequest
	{
		return new PendingRoadmapDeleteMutationRequest($this, ['id' => $id]);
	}

	public function roadmapToProjectCreateMutation(RoadmapToProjectCreateInput $input): PendingRoadmapToProjectCreateMutationRequest
	{
		return new PendingRoadmapToProjectCreateMutationRequest($this, ['input' => $input]);
	}

	public function roadmapToProjectUpdateMutation(RoadmapToProjectUpdateInput $input, string $id): PendingRoadmapToProjectUpdateMutationRequest
	{
		return new PendingRoadmapToProjectUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function roadmapToProjectDeleteMutation(string $id): PendingRoadmapToProjectDeleteMutationRequest
	{
		return new PendingRoadmapToProjectDeleteMutationRequest($this, ['id' => $id]);
	}

	public function teamKeyDeleteMutation(string $id): PendingTeamKeyDeleteMutationRequest
	{
		return new PendingTeamKeyDeleteMutationRequest($this, ['id' => $id]);
	}

	public function teamMembershipCreateMutation(TeamMembershipCreateInput $input): PendingTeamMembershipCreateMutationRequest
	{
		return new PendingTeamMembershipCreateMutationRequest($this, ['input' => $input]);
	}

	public function teamMembershipUpdateMutation(TeamMembershipUpdateInput $input, string $id): PendingTeamMembershipUpdateMutationRequest
	{
		return new PendingTeamMembershipUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function teamMembershipDeleteMutation(string $id): PendingTeamMembershipDeleteMutationRequest
	{
		return new PendingTeamMembershipDeleteMutationRequest($this, ['id' => $id]);
	}

	public function teamCreateMutation(TeamCreateInput $input, ?string $copySettingsFromTeamId = null): PendingTeamCreateMutationRequest
	{
		return new PendingTeamCreateMutationRequest($this, ['input' => $input, 'copySettingsFromTeamId' => $copySettingsFromTeamId]);
	}

	public function teamUpdateMutation(TeamUpdateInput $input, string $id): PendingTeamUpdateMutationRequest
	{
		return new PendingTeamUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function teamDeleteMutation(string $id): PendingTeamDeleteMutationRequest
	{
		return new PendingTeamDeleteMutationRequest($this, ['id' => $id]);
	}

	public function teamUnarchiveMutation(string $id): PendingTeamUnarchiveMutationRequest
	{
		return new PendingTeamUnarchiveMutationRequest($this, ['id' => $id]);
	}

	public function teamCyclesDeleteMutation(string $id): PendingTeamCyclesDeleteMutationRequest
	{
		return new PendingTeamCyclesDeleteMutationRequest($this, ['id' => $id]);
	}

	public function templateCreateMutation(TemplateCreateInput $input): PendingTemplateCreateMutationRequest
	{
		return new PendingTemplateCreateMutationRequest($this, ['input' => $input]);
	}

	public function templateUpdateMutation(TemplateUpdateInput $input, string $id): PendingTemplateUpdateMutationRequest
	{
		return new PendingTemplateUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function templateDeleteMutation(string $id): PendingTemplateDeleteMutationRequest
	{
		return new PendingTemplateDeleteMutationRequest($this, ['id' => $id]);
	}

	public function timeScheduleCreateMutation(TimeScheduleCreateInput $input): PendingTimeScheduleCreateMutationRequest
	{
		return new PendingTimeScheduleCreateMutationRequest($this, ['input' => $input]);
	}

	public function timeScheduleUpdateMutation(TimeScheduleUpdateInput $input, string $id): PendingTimeScheduleUpdateMutationRequest
	{
		return new PendingTimeScheduleUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function timeScheduleUpsertExternalMutation(TimeScheduleUpdateInput $input, string $externalId): PendingTimeScheduleUpsertExternalMutationRequest
	{
		return new PendingTimeScheduleUpsertExternalMutationRequest($this, ['input' => $input, 'externalId' => $externalId]);
	}

	public function timeScheduleDeleteMutation(string $id): PendingTimeScheduleDeleteMutationRequest
	{
		return new PendingTimeScheduleDeleteMutationRequest($this, ['id' => $id]);
	}

	public function timeScheduleRefreshIntegrationScheduleMutation(string $id): PendingTimeScheduleRefreshIntegrationScheduleMutationRequest
	{
		return new PendingTimeScheduleRefreshIntegrationScheduleMutationRequest($this, ['id' => $id]);
	}

	public function triageResponsibilityCreateMutation(TriageResponsibilityCreateInput $input): PendingTriageResponsibilityCreateMutationRequest
	{
		return new PendingTriageResponsibilityCreateMutationRequest($this, ['input' => $input]);
	}

	public function triageResponsibilityUpdateMutation(TriageResponsibilityUpdateInput $input, string $id): PendingTriageResponsibilityUpdateMutationRequest
	{
		return new PendingTriageResponsibilityUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function triageResponsibilityDeleteMutation(string $id): PendingTriageResponsibilityDeleteMutationRequest
	{
		return new PendingTriageResponsibilityDeleteMutationRequest($this, ['id' => $id]);
	}

	public function userUpdateMutation(UserUpdateInput $input, string $id): PendingUserUpdateMutationRequest
	{
		return new PendingUserUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function userDiscordConnectMutation(string $redirectUri, string $code): PendingUserDiscordConnectMutationRequest
	{
		return new PendingUserDiscordConnectMutationRequest($this, ['redirectUri' => $redirectUri, 'code' => $code]);
	}

	public function userExternalUserDisconnectMutation(string $service): PendingUserExternalUserDisconnectMutationRequest
	{
		return new PendingUserExternalUserDisconnectMutationRequest($this, ['service' => $service]);
	}

	public function userPromoteAdminMutation(string $id): PendingUserPromoteAdminMutationRequest
	{
		return new PendingUserPromoteAdminMutationRequest($this, ['id' => $id]);
	}

	public function userDemoteAdminMutation(string $id): PendingUserDemoteAdminMutationRequest
	{
		return new PendingUserDemoteAdminMutationRequest($this, ['id' => $id]);
	}

	public function userPromoteMemberMutation(string $id): PendingUserPromoteMemberMutationRequest
	{
		return new PendingUserPromoteMemberMutationRequest($this, ['id' => $id]);
	}

	public function userDemoteMemberMutation(string $id): PendingUserDemoteMemberMutationRequest
	{
		return new PendingUserDemoteMemberMutationRequest($this, ['id' => $id]);
	}

	public function userSuspendMutation(string $id): PendingUserSuspendMutationRequest
	{
		return new PendingUserSuspendMutationRequest($this, ['id' => $id]);
	}

	public function userUnsuspendMutation(string $id): PendingUserUnsuspendMutationRequest
	{
		return new PendingUserUnsuspendMutationRequest($this, ['id' => $id]);
	}

	public function userSettingsUpdateMutation(UserSettingsUpdateInput $input, string $id): PendingUserSettingsUpdateMutationRequest
	{
		return new PendingUserSettingsUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function userSettingsFlagIncrementMutation(string $flag): PendingUserSettingsFlagIncrementMutationRequest
	{
		return new PendingUserSettingsFlagIncrementMutationRequest($this, ['flag' => $flag]);
	}

	public function userSettingsFlagsResetMutation(?iterable $flags = null): PendingUserSettingsFlagsResetMutationRequest
	{
		return new PendingUserSettingsFlagsResetMutationRequest($this, ['flags' => $flags]);
	}

	public function userFlagUpdateMutation(UserFlagUpdateOperation $operation, UserFlagType $flag): PendingUserFlagUpdateMutationRequest
	{
		return new PendingUserFlagUpdateMutationRequest($this, ['operation' => $operation, 'flag' => $flag]);
	}

	public function viewPreferencesCreateMutation(ViewPreferencesCreateInput $input): PendingViewPreferencesCreateMutationRequest
	{
		return new PendingViewPreferencesCreateMutationRequest($this, ['input' => $input]);
	}

	public function viewPreferencesUpdateMutation(ViewPreferencesUpdateInput $input, string $id): PendingViewPreferencesUpdateMutationRequest
	{
		return new PendingViewPreferencesUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function viewPreferencesDeleteMutation(string $id): PendingViewPreferencesDeleteMutationRequest
	{
		return new PendingViewPreferencesDeleteMutationRequest($this, ['id' => $id]);
	}

	public function webhookCreateMutation(WebhookCreateInput $input): PendingWebhookCreateMutationRequest
	{
		return new PendingWebhookCreateMutationRequest($this, ['input' => $input]);
	}

	public function webhookUpdateMutation(WebhookUpdateInput $input, string $id): PendingWebhookUpdateMutationRequest
	{
		return new PendingWebhookUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function webhookDeleteMutation(string $id): PendingWebhookDeleteMutationRequest
	{
		return new PendingWebhookDeleteMutationRequest($this, ['id' => $id]);
	}

	public function workflowStateCreateMutation(WorkflowStateCreateInput $input): PendingWorkflowStateCreateMutationRequest
	{
		return new PendingWorkflowStateCreateMutationRequest($this, ['input' => $input]);
	}

	public function workflowStateUpdateMutation(WorkflowStateUpdateInput $input, string $id): PendingWorkflowStateUpdateMutationRequest
	{
		return new PendingWorkflowStateUpdateMutationRequest($this, ['input' => $input, 'id' => $id]);
	}

	public function workflowStateArchiveMutation(string $id): PendingWorkflowStateArchiveMutationRequest
	{
		return new PendingWorkflowStateArchiveMutationRequest($this, ['id' => $id]);
	}
}
