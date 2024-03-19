<?php

namespace Glhd\Linearavel\Connectors;

use Glhd\Linearavel\Requests\Inputs\ApiKeyCreateInput, Glhd\Linearavel\Data\ApiKeyPayload, Glhd\Linearavel\Requests\PendingLinearObjectRequest, Glhd\Linearavel\Data\DeletePayload, Glhd\Linearavel\Requests\Inputs\AttachmentCreateInput, Glhd\Linearavel\Data\AttachmentPayload, Glhd\Linearavel\Requests\Inputs\AttachmentUpdateInput, Glhd\Linearavel\Data\FrontAttachmentPayload, Glhd\Linearavel\Data\AttachmentArchivePayload, Glhd\Linearavel\Requests\Inputs\EmailUserAccountAuthChallengeInput, Glhd\Linearavel\Data\EmailUserAccountAuthChallengeResponse, Glhd\Linearavel\Requests\Inputs\TokenUserAccountAuthInput, Glhd\Linearavel\Data\AuthResolverResponse, Glhd\Linearavel\Requests\Inputs\GoogleUserAccountAuthInput, Glhd\Linearavel\Requests\Inputs\OnboardingCustomerSurvey, Glhd\Linearavel\Requests\Inputs\CreateOrganizationInput, Glhd\Linearavel\Data\CreateOrJoinOrganizationResponse, Glhd\Linearavel\Requests\Inputs\JoinOrganizationInput, Glhd\Linearavel\Data\LogoutResponse, Glhd\Linearavel\Requests\Inputs\CommentCreateInput, Glhd\Linearavel\Data\CommentPayload, Glhd\Linearavel\Requests\Inputs\CommentUpdateInput, Glhd\Linearavel\Requests\Inputs\ContactCreateInput, Glhd\Linearavel\Data\ContactPayload, Glhd\Linearavel\Requests\Inputs\ContactSalesCreateInput, Glhd\Linearavel\Requests\Inputs\CustomViewCreateInput, Glhd\Linearavel\Data\CustomViewPayload, Glhd\Linearavel\Requests\Inputs\CustomViewUpdateInput, Glhd\Linearavel\Requests\Inputs\CycleCreateInput, Glhd\Linearavel\Data\CyclePayload, Glhd\Linearavel\Requests\Inputs\CycleUpdateInput, Glhd\Linearavel\Data\CycleArchivePayload, Glhd\Linearavel\Requests\Inputs\CycleShiftAllInput, Glhd\Linearavel\Requests\Inputs\DocumentCreateInput, Glhd\Linearavel\Data\DocumentPayload, Glhd\Linearavel\Requests\Inputs\DocumentUpdateInput, Glhd\Linearavel\Requests\Inputs\EmailIntakeAddressCreateInput, Glhd\Linearavel\Data\EmailIntakeAddressPayload, Glhd\Linearavel\Requests\Inputs\EmailIntakeAddressUpdateInput, Glhd\Linearavel\Requests\Inputs\EmailUnsubscribeInput, Glhd\Linearavel\Data\EmailUnsubscribePayload, Glhd\Linearavel\Requests\Inputs\EmojiCreateInput, Glhd\Linearavel\Data\EmojiPayload, Glhd\Linearavel\Requests\Inputs\InitiativeToProjectCreateInput, Glhd\Linearavel\Data\InitiativeToProjectPayload, Glhd\Linearavel\Requests\Inputs\InitiativeToProjectUpdateInput, Glhd\Linearavel\Requests\Inputs\InitiativeCreateInput, Glhd\Linearavel\Data\InitiativePayload, Glhd\Linearavel\Requests\Inputs\InitiativeUpdateInput, Glhd\Linearavel\Data\InitiativeArchivePayload, Glhd\Linearavel\Requests\Inputs\FavoriteCreateInput, Glhd\Linearavel\Data\FavoritePayload, Glhd\Linearavel\Requests\Inputs\FavoriteUpdateInput, Glhd\Linearavel\Data\UploadPayload, Glhd\Linearavel\Data\ImageUploadFromUrlPayload, Glhd\Linearavel\Requests\Inputs\GitAutomationStateCreateInput, Glhd\Linearavel\Data\GitAutomationStatePayload, Glhd\Linearavel\Requests\Inputs\GitAutomationStateUpdateInput, Glhd\Linearavel\Requests\Inputs\GitAutomationTargetBranchCreateInput, Glhd\Linearavel\Data\GitAutomationTargetBranchPayload, Glhd\Linearavel\Requests\Inputs\GitAutomationTargetBranchUpdateInput, Glhd\Linearavel\Requests\Inputs\IntegrationRequestInput, Glhd\Linearavel\Data\IntegrationRequestPayload, Glhd\Linearavel\Requests\Inputs\IntegrationSettingsInput, Glhd\Linearavel\Data\IntegrationPayload, Glhd\Linearavel\Data\GitHubCommitIntegrationPayload, Glhd\Linearavel\Requests\Inputs\AirbyteConfigurationInput, Glhd\Linearavel\Requests\Inputs\JiraConfigurationInput, Glhd\Linearavel\Requests\Inputs\JiraUpdateInput, Glhd\Linearavel\Requests\Inputs\IntercomSettingsInput, Glhd\Linearavel\Data\AsksChannelConnectPayload, Glhd\Linearavel\Data\SlackChannelConnectPayload, Glhd\Linearavel\Requests\Inputs\IntegrationsSettingsCreateInput, Glhd\Linearavel\Data\IntegrationsSettingsPayload, Glhd\Linearavel\Requests\Inputs\IntegrationsSettingsUpdateInput, Glhd\Linearavel\Requests\Inputs\IntegrationTemplateCreateInput, Glhd\Linearavel\Data\IntegrationTemplatePayload, Glhd\Linearavel\Data\IssueImportPayload, Glhd\Linearavel\Data\IssueImportDeletePayload, Glhd\Linearavel\Requests\Inputs\IssueImportUpdateInput, Glhd\Linearavel\Requests\Inputs\IssueLabelCreateInput, Glhd\Linearavel\Data\IssueLabelPayload, Glhd\Linearavel\Requests\Inputs\IssueLabelUpdateInput, Glhd\Linearavel\Requests\Inputs\IssueRelationCreateInput, Glhd\Linearavel\Data\IssueRelationPayload, Glhd\Linearavel\Requests\Inputs\IssueRelationUpdateInput, Glhd\Linearavel\Requests\Inputs\IssueCreateInput, Glhd\Linearavel\Data\IssuePayload, Glhd\Linearavel\Requests\Inputs\IssueUpdateInput, Glhd\Linearavel\Data\IssueBatchPayload, Glhd\Linearavel\Data\IssueArchivePayload, DateTimeInterface, Glhd\Linearavel\Requests\Inputs\NotificationUpdateInput, Glhd\Linearavel\Data\NotificationPayload, Glhd\Linearavel\Requests\Inputs\NotificationEntityInput, Glhd\Linearavel\Data\NotificationBatchActionPayload, Glhd\Linearavel\Data\NotificationArchivePayload, Glhd\Linearavel\Requests\Inputs\NotificationSubscriptionCreateInput, Glhd\Linearavel\Data\NotificationSubscriptionPayload, Glhd\Linearavel\Requests\Inputs\NotificationSubscriptionUpdateInput, Glhd\Linearavel\Data\OrganizationDomainSimplePayload, Glhd\Linearavel\Requests\Inputs\OrganizationDomainVerificationInput, Glhd\Linearavel\Data\OrganizationDomainPayload, Glhd\Linearavel\Requests\Inputs\OrganizationDomainCreateInput, Glhd\Linearavel\Requests\Inputs\OrganizationInviteCreateInput, Glhd\Linearavel\Data\OrganizationInvitePayload, Glhd\Linearavel\Requests\Inputs\OrganizationInviteUpdateInput, Glhd\Linearavel\Requests\Inputs\OrganizationUpdateInput, Glhd\Linearavel\Data\OrganizationPayload, Glhd\Linearavel\Data\OrganizationDeletePayload, Glhd\Linearavel\Requests\Inputs\DeleteOrganizationInput, Glhd\Linearavel\Data\OrganizationCancelDeletePayload, Glhd\Linearavel\Data\OrganizationStartPlusTrialPayload, Glhd\Linearavel\Requests\Inputs\ProjectLinkCreateInput, Glhd\Linearavel\Data\ProjectLinkPayload, Glhd\Linearavel\Requests\Inputs\ProjectLinkUpdateInput, Glhd\Linearavel\Requests\Inputs\ProjectMilestoneCreateInput, Glhd\Linearavel\Data\ProjectMilestonePayload, Glhd\Linearavel\Requests\Inputs\ProjectMilestoneUpdateInput, Glhd\Linearavel\Requests\Inputs\ProjectCreateInput, Glhd\Linearavel\Data\ProjectPayload, Glhd\Linearavel\Requests\Inputs\ProjectUpdateInput, Glhd\Linearavel\Data\ProjectArchivePayload, Glhd\Linearavel\Requests\Inputs\ProjectUpdateInteractionCreateInput, Glhd\Linearavel\Data\ProjectUpdateInteractionPayload, Glhd\Linearavel\Requests\Inputs\ProjectUpdateCreateInput, Glhd\Linearavel\Data\ProjectUpdatePayload, Glhd\Linearavel\Requests\Inputs\ProjectUpdateUpdateInput, Glhd\Linearavel\Data\ProjectUpdateWithInteractionPayload, Glhd\Linearavel\Data\ProjectUpdateReminderPayload, Glhd\Linearavel\Requests\Inputs\PushSubscriptionCreateInput, Glhd\Linearavel\Data\PushSubscriptionPayload, Glhd\Linearavel\Requests\Inputs\ReactionCreateInput, Glhd\Linearavel\Data\ReactionPayload, Glhd\Linearavel\Data\CreateCsvExportReportPayload, Glhd\Linearavel\Requests\Inputs\RoadmapCreateInput, Glhd\Linearavel\Data\RoadmapPayload, Glhd\Linearavel\Requests\Inputs\RoadmapUpdateInput, Glhd\Linearavel\Data\RoadmapArchivePayload, Glhd\Linearavel\Requests\Inputs\RoadmapToProjectCreateInput, Glhd\Linearavel\Data\RoadmapToProjectPayload, Glhd\Linearavel\Requests\Inputs\RoadmapToProjectUpdateInput, Glhd\Linearavel\Requests\Inputs\TeamMembershipCreateInput, Glhd\Linearavel\Data\TeamMembershipPayload, Glhd\Linearavel\Requests\Inputs\TeamMembershipUpdateInput, Glhd\Linearavel\Requests\Inputs\TeamCreateInput, Glhd\Linearavel\Data\TeamPayload, Glhd\Linearavel\Requests\Inputs\TeamUpdateInput, Glhd\Linearavel\Data\TeamArchivePayload, Glhd\Linearavel\Requests\Inputs\TemplateCreateInput, Glhd\Linearavel\Data\TemplatePayload, Glhd\Linearavel\Requests\Inputs\TemplateUpdateInput, Glhd\Linearavel\Requests\Inputs\TimeScheduleCreateInput, Glhd\Linearavel\Data\TimeSchedulePayload, Glhd\Linearavel\Requests\Inputs\TimeScheduleUpdateInput, Glhd\Linearavel\Requests\Inputs\TriageResponsibilityCreateInput, Glhd\Linearavel\Data\TriageResponsibilityPayload, Glhd\Linearavel\Requests\Inputs\TriageResponsibilityUpdateInput, Glhd\Linearavel\Requests\Inputs\UserUpdateInput, Glhd\Linearavel\Data\UserPayload, Glhd\Linearavel\Data\UserAdminPayload, Glhd\Linearavel\Requests\Inputs\UserSettingsUpdateInput, Glhd\Linearavel\Data\UserSettingsPayload, Glhd\Linearavel\Data\UserSettingsFlagPayload, Glhd\Linearavel\Data\UserSettingsFlagsResetPayload, Glhd\Linearavel\Data\Enums\UserFlagUpdateOperation, Glhd\Linearavel\Data\Enums\UserFlagType, Glhd\Linearavel\Requests\Inputs\ViewPreferencesCreateInput, Glhd\Linearavel\Data\ViewPreferencesPayload, Glhd\Linearavel\Requests\Inputs\ViewPreferencesUpdateInput, Glhd\Linearavel\Requests\Inputs\WebhookCreateInput, Glhd\Linearavel\Data\WebhookPayload, Glhd\Linearavel\Requests\Inputs\WebhookUpdateInput, Glhd\Linearavel\Requests\Inputs\WorkflowStateCreateInput, Glhd\Linearavel\Data\WorkflowStatePayload, Glhd\Linearavel\Requests\Inputs\WorkflowStateUpdateInput, Glhd\Linearavel\Data\WorkflowStateArchivePayload;

trait MutatesLinear
{
	/**
	 * @param ApiKeyCreateInput $input The api key object to create.
	 * @returns PendingLinearObjectRequest<ApiKeyPayload>
	 */
	function apiKeyCreateMutation(ApiKeyCreateInput $input)
	{
		return $this->linearObjectMutation('apiKeyCreateMutation', ApiKeyPayload::class, compact('input'));
	}
	
	/**
	 * @param string $id The identifier of the API key to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function apiKeyDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('apiKeyDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param AttachmentCreateInput $input The attachment object to create.
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	function attachmentCreateMutation(AttachmentCreateInput $input)
	{
		return $this->linearObjectMutation('attachmentCreateMutation', AttachmentPayload::class, compact('input'));
	}
	
	/**
	 * @param AttachmentUpdateInput $input A partial attachment object to update the attachment with.
	 * @param string $id The identifier of the attachment to update.
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	function attachmentUpdateMutation(AttachmentUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('attachmentUpdateMutation', AttachmentPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the attachment to unsync.
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	function attachmentUnsyncSlackMutation(string $id)
	{
		return $this->linearObjectMutation('attachmentUnsyncSlackMutation', AttachmentPayload::class, compact('id'));
	}
	
	/**
	 * @param ?string $createAsUser Create attachment as a user with the provided name. This option is only available to OAuth applications creating attachments in `actor=application` mode.
	 * @param ?string $displayIconUrl Provide an external user avatar URL. Can only be used in conjunction with the `createAsUser` options. This option is only available to OAuth applications creating comments in `actor=application` mode.
	 * @param ?string $title The title to use for the attachment.
	 * @param string $url The url to link.
	 * @param string $issueId The issue for which to link the url.
	 * @param ?string $id The id for the attachment.
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	function attachmentLinkURLMutation(string $url, string $issueId, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $id = null)
	{
		return $this->linearObjectMutation('attachmentLinkURLMutation', AttachmentPayload::class, compact('url', 'issueId', 'createAsUser', 'displayIconUrl', 'title', 'id'));
	}
	
	/**
	 * @param ?string $createAsUser Create attachment as a user with the provided name. This option is only available to OAuth applications creating attachments in `actor=application` mode.
	 * @param ?string $displayIconUrl Provide an external user avatar URL. Can only be used in conjunction with the `createAsUser` options. This option is only available to OAuth applications creating comments in `actor=application` mode.
	 * @param ?string $title The title to use for the attachment.
	 * @param string $issueId The issue for which to link the GitLab merge request.
	 * @param ?string $id Optional attachment ID that may be provided through the API.
	 * @param string $url The URL of the GitLab merge request to link.
	 * @param string $projectPathWithNamespace The path name to the project including any (sub)groups. E.g. linear/main/client.
	 * @param float $number The GitLab merge request number to link.
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	function attachmentLinkGitLabMRMutation(
		string $issueId,
		string $url,
		string $projectPathWithNamespace,
		float $number,
		?string $createAsUser = null,
		?string $displayIconUrl = null,
		?string $title = null,
		?string $id = null
	) {
		return $this->linearObjectMutation('attachmentLinkGitLabMRMutation', AttachmentPayload::class, compact('issueId', 'url', 'projectPathWithNamespace', 'number', 'createAsUser', 'displayIconUrl', 'title', 'id'));
	}
	
	/**
	 * @param ?string $createAsUser Create attachment as a user with the provided name. This option is only available to OAuth applications creating attachments in `actor=application` mode.
	 * @param ?string $displayIconUrl Provide an external user avatar URL. Can only be used in conjunction with the `createAsUser` options. This option is only available to OAuth applications creating comments in `actor=application` mode.
	 * @param ?string $title The title to use for the attachment.
	 * @param string $issueId The Linear issue for which to link the GitHub issue.
	 * @param ?string $id Optional attachment ID that may be provided through the API.
	 * @param string $url The URL of the GitHub issue to link.
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	function attachmentLinkGitHubIssueMutation(string $issueId, string $url, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $id = null)
	{
		return $this->linearObjectMutation('attachmentLinkGitHubIssueMutation', AttachmentPayload::class, compact('issueId', 'url', 'createAsUser', 'displayIconUrl', 'title', 'id'));
	}
	
	/**
	 * @param ?string $createAsUser Create attachment as a user with the provided name. This option is only available to OAuth applications creating attachments in `actor=application` mode.
	 * @param ?string $displayIconUrl Provide an external user avatar URL. Can only be used in conjunction with the `createAsUser` options. This option is only available to OAuth applications creating comments in `actor=application` mode.
	 * @param ?string $title The title to use for the attachment.
	 * @param string $issueId The issue for which to link the GitHub pull request.
	 * @param ?string $id Optional attachment ID that may be provided through the API.
	 * @param string $url The URL of the GitHub pull request to link.
	 * @param ?string $owner The owner of the GitHub repository.
	 * @param ?string $repo The name of the GitHub repository.
	 * @param ?float $number The GitHub pull request number to link.
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	function attachmentLinkGitHubPRMutation(
		string $issueId,
		string $url,
		?string $createAsUser = null,
		?string $displayIconUrl = null,
		?string $title = null,
		?string $id = null,
		?string $owner = null,
		?string $repo = null,
		?float $number = null
	) {
		return $this->linearObjectMutation('attachmentLinkGitHubPRMutation', AttachmentPayload::class, compact('issueId', 'url', 'createAsUser', 'displayIconUrl', 'title', 'id', 'owner', 'repo', 'number'));
	}
	
	/**
	 * @param ?string $createAsUser Create attachment as a user with the provided name. This option is only available to OAuth applications creating attachments in `actor=application` mode.
	 * @param ?string $displayIconUrl Provide an external user avatar URL. Can only be used in conjunction with the `createAsUser` options. This option is only available to OAuth applications creating comments in `actor=application` mode.
	 * @param ?string $title The title to use for the attachment.
	 * @param string $ticketId The Zendesk ticket ID to link.
	 * @param string $issueId The issue for which to link the Zendesk ticket.
	 * @param ?string $id Optional attachment ID that may be provided through the API.
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	function attachmentLinkZendeskMutation(string $ticketId, string $issueId, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $id = null)
	{
		return $this->linearObjectMutation('attachmentLinkZendeskMutation', AttachmentPayload::class, compact('ticketId', 'issueId', 'createAsUser', 'displayIconUrl', 'title', 'id'));
	}
	
	/**
	 * @param ?string $createAsUser Create attachment as a user with the provided name. This option is only available to OAuth applications creating attachments in `actor=application` mode.
	 * @param ?string $displayIconUrl Provide an external user avatar URL. Can only be used in conjunction with the `createAsUser` options. This option is only available to OAuth applications creating comments in `actor=application` mode.
	 * @param ?string $title The title to use for the attachment.
	 * @param string $issueId The issue for which to link the Discord message.
	 * @param ?string $id Optional attachment ID that may be provided through the API.
	 * @param string $channelId The Discord channel ID for the message to link.
	 * @param string $messageId The Discord message ID for the message to link.
	 * @param string $url The Discord message URL for the message to link.
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	function attachmentLinkDiscordMutation(
		string $issueId,
		string $channelId,
		string $messageId,
		string $url,
		?string $createAsUser = null,
		?string $displayIconUrl = null,
		?string $title = null,
		?string $id = null
	) {
		return $this->linearObjectMutation('attachmentLinkDiscordMutation', AttachmentPayload::class, compact('issueId', 'channelId', 'messageId', 'url', 'createAsUser', 'displayIconUrl', 'title', 'id'));
	}
	
	/**
	 * @param ?string $createAsUser Create attachment as a user with the provided name. This option is only available to OAuth applications creating attachments in `actor=application` mode.
	 * @param ?string $displayIconUrl Provide an external user avatar URL. Can only be used in conjunction with the `createAsUser` options. This option is only available to OAuth applications creating comments in `actor=application` mode.
	 * @param ?string $title The title to use for the attachment.
	 * @param string $channel The Slack channel ID for the message to link.
	 * @param ?string $ts Unique identifier of either a thread's parent message or a message in the thread.
	 * @param string $latest The latest timestamp for the Slack message.
	 * @param string $issueId The issue to which to link the Slack message.
	 * @param string $url The Slack message URL for the message to link.
	 * @param ?string $id Optional attachment ID that may be provided through the API.
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	function attachmentLinkSlackMutation(
		string $channel,
		string $latest,
		string $issueId,
		string $url,
		?string $createAsUser = null,
		?string $displayIconUrl = null,
		?string $title = null,
		?string $ts = null,
		?string $id = null
	) {
		return $this->linearObjectMutation('attachmentLinkSlackMutation', AttachmentPayload::class, compact('channel', 'latest', 'issueId', 'url', 'createAsUser', 'displayIconUrl', 'title', 'ts', 'id'));
	}
	
	/**
	 * @param ?string $createAsUser Create attachment as a user with the provided name. This option is only available to OAuth applications creating attachments in `actor=application` mode.
	 * @param ?string $displayIconUrl Provide an external user avatar URL. Can only be used in conjunction with the `createAsUser` options. This option is only available to OAuth applications creating comments in `actor=application` mode.
	 * @param ?string $title The title to use for the attachment.
	 * @param string $conversationId The Front conversation ID to link.
	 * @param string $issueId The issue for which to link the Front conversation.
	 * @param ?string $id Optional attachment ID that may be provided through the API.
	 * @returns PendingLinearObjectRequest<FrontAttachmentPayload>
	 */
	function attachmentLinkFrontMutation(string $conversationId, string $issueId, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $id = null)
	{
		return $this->linearObjectMutation('attachmentLinkFrontMutation', FrontAttachmentPayload::class, compact('conversationId', 'issueId', 'createAsUser', 'displayIconUrl', 'title', 'id'));
	}
	
	/**
	 * @param ?string $createAsUser Create attachment as a user with the provided name. This option is only available to OAuth applications creating attachments in `actor=application` mode.
	 * @param ?string $displayIconUrl Provide an external user avatar URL. Can only be used in conjunction with the `createAsUser` options. This option is only available to OAuth applications creating comments in `actor=application` mode.
	 * @param ?string $title The title to use for the attachment.
	 * @param string $conversationId The Intercom conversation ID to link.
	 * @param ?string $id Optional attachment ID that may be provided through the API.
	 * @param string $issueId The issue for which to link the Intercom conversation.
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	function attachmentLinkIntercomMutation(string $conversationId, string $issueId, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $id = null)
	{
		return $this->linearObjectMutation('attachmentLinkIntercomMutation', AttachmentPayload::class, compact('conversationId', 'issueId', 'createAsUser', 'displayIconUrl', 'title', 'id'));
	}
	
	/**
	 * @param string $issueId The issue for which to link the Jira issue.
	 * @param string $jiraIssueId The Jira issue key or ID to link.
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	function attachmentLinkJiraIssueMutation(string $issueId, string $jiraIssueId)
	{
		return $this->linearObjectMutation('attachmentLinkJiraIssueMutation', AttachmentPayload::class, compact('issueId', 'jiraIssueId'));
	}
	
	/**
	 * @param string $id The identifier of the attachment to archive.
	 * @returns PendingLinearObjectRequest<AttachmentArchivePayload>
	 */
	function attachmentArchiveMutation(string $id)
	{
		return $this->linearObjectMutation('attachmentArchiveMutation', AttachmentArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the attachment to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function attachmentDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('attachmentDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param EmailUserAccountAuthChallengeInput $input The data used for email authentication.
	 * @returns PendingLinearObjectRequest<EmailUserAccountAuthChallengeResponse>
	 */
	function emailUserAccountAuthChallengeMutation(EmailUserAccountAuthChallengeInput $input)
	{
		return $this->linearObjectMutation('emailUserAccountAuthChallengeMutation', EmailUserAccountAuthChallengeResponse::class, compact('input'));
	}
	
	/**
	 * @param TokenUserAccountAuthInput $input The data used for token authentication.
	 * @returns PendingLinearObjectRequest<AuthResolverResponse>
	 */
	function emailTokenUserAccountAuthMutation(TokenUserAccountAuthInput $input)
	{
		return $this->linearObjectMutation('emailTokenUserAccountAuthMutation', AuthResolverResponse::class, compact('input'));
	}
	
	/**
	 * @param TokenUserAccountAuthInput $input The data used for token authentication.
	 * @returns PendingLinearObjectRequest<AuthResolverResponse>
	 */
	function samlTokenUserAccountAuthMutation(TokenUserAccountAuthInput $input)
	{
		return $this->linearObjectMutation('samlTokenUserAccountAuthMutation', AuthResolverResponse::class, compact('input'));
	}
	
	/**
	 * @param GoogleUserAccountAuthInput $input The data used for Google authentication.
	 * @returns PendingLinearObjectRequest<AuthResolverResponse>
	 */
	function googleUserAccountAuthMutation(GoogleUserAccountAuthInput $input)
	{
		return $this->linearObjectMutation('googleUserAccountAuthMutation', AuthResolverResponse::class, compact('input'));
	}
	
	/**
	 * @param ?OnboardingCustomerSurvey $survey Onboarding survey.
	 * @param CreateOrganizationInput $input Organization details for the new organization.
	 * @returns PendingLinearObjectRequest<CreateOrJoinOrganizationResponse>
	 */
	function createOrganizationFromOnboardingMutation(CreateOrganizationInput $input, ?OnboardingCustomerSurvey $survey = null)
	{
		return $this->linearObjectMutation('createOrganizationFromOnboardingMutation', CreateOrJoinOrganizationResponse::class, compact('input', 'survey'));
	}
	
	/**
	 * @param JoinOrganizationInput $input Organization details for the organization to join.
	 * @returns PendingLinearObjectRequest<CreateOrJoinOrganizationResponse>
	 */
	function joinOrganizationFromOnboardingMutation(JoinOrganizationInput $input)
	{
		return $this->linearObjectMutation('joinOrganizationFromOnboardingMutation', CreateOrJoinOrganizationResponse::class, compact('input'));
	}
	
	/**
	 * @param string $organizationId ID of the organization to leave.
	 * @returns PendingLinearObjectRequest<CreateOrJoinOrganizationResponse>
	 */
	function leaveOrganizationMutation(string $organizationId)
	{
		return $this->linearObjectMutation('leaveOrganizationMutation', CreateOrJoinOrganizationResponse::class, compact('organizationId'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<LogoutResponse>
	 */
	function logoutMutation()
	{
		return $this->linearObjectMutation('logoutMutation', LogoutResponse::class);
	}
	
	/**
	 * @param string $sessionId ID of the session to logout.
	 * @returns PendingLinearObjectRequest<LogoutResponse>
	 */
	function logoutSessionMutation(string $sessionId)
	{
		return $this->linearObjectMutation('logoutSessionMutation', LogoutResponse::class, compact('sessionId'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<LogoutResponse>
	 */
	function logoutAllSessionsMutation()
	{
		return $this->linearObjectMutation('logoutAllSessionsMutation', LogoutResponse::class);
	}
	
	/**
	 * @returns PendingLinearObjectRequest<LogoutResponse>
	 */
	function logoutOtherSessionsMutation()
	{
		return $this->linearObjectMutation('logoutOtherSessionsMutation', LogoutResponse::class);
	}
	
	/**
	 * @param CommentCreateInput $input The comment object to create.
	 * @returns PendingLinearObjectRequest<CommentPayload>
	 */
	function commentCreateMutation(CommentCreateInput $input)
	{
		return $this->linearObjectMutation('commentCreateMutation', CommentPayload::class, compact('input'));
	}
	
	/**
	 * @param CommentUpdateInput $input A partial comment object to update the comment with.
	 * @param string $id The identifier of the comment to update.
	 * @returns PendingLinearObjectRequest<CommentPayload>
	 */
	function commentUpdateMutation(CommentUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('commentUpdateMutation', CommentPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the comment to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function commentDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('commentDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param ?string $resolvingCommentId
	 * @param string $id The identifier of the comment to update.
	 * @returns PendingLinearObjectRequest<CommentPayload>
	 */
	function commentResolveMutation(string $id, ?string $resolvingCommentId = null)
	{
		return $this->linearObjectMutation('commentResolveMutation', CommentPayload::class, compact('id', 'resolvingCommentId'));
	}
	
	/**
	 * @param string $id The identifier of the comment to update.
	 * @returns PendingLinearObjectRequest<CommentPayload>
	 */
	function commentUnresolveMutation(string $id)
	{
		return $this->linearObjectMutation('commentUnresolveMutation', CommentPayload::class, compact('id'));
	}
	
	/**
	 * @param ContactCreateInput $input The contact entry to create.
	 * @returns PendingLinearObjectRequest<ContactPayload>
	 */
	function contactCreateMutation(ContactCreateInput $input)
	{
		return $this->linearObjectMutation('contactCreateMutation', ContactPayload::class, compact('input'));
	}
	
	/**
	 * @param ContactSalesCreateInput $input The contact entry to create.
	 * @returns PendingLinearObjectRequest<ContactPayload>
	 */
	function contactSalesCreateMutation(ContactSalesCreateInput $input)
	{
		return $this->linearObjectMutation('contactSalesCreateMutation', ContactPayload::class, compact('input'));
	}
	
	/**
	 * @param CustomViewCreateInput $input The properties of the custom view to create.
	 * @returns PendingLinearObjectRequest<CustomViewPayload>
	 */
	function customViewCreateMutation(CustomViewCreateInput $input)
	{
		return $this->linearObjectMutation('customViewCreateMutation', CustomViewPayload::class, compact('input'));
	}
	
	/**
	 * @param CustomViewUpdateInput $input The properties of the custom view to update.
	 * @param string $id The identifier of the custom view to update.
	 * @returns PendingLinearObjectRequest<CustomViewPayload>
	 */
	function customViewUpdateMutation(CustomViewUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('customViewUpdateMutation', CustomViewPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the custom view to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function customViewDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('customViewDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param CycleCreateInput $input The cycle object to create.
	 * @returns PendingLinearObjectRequest<CyclePayload>
	 */
	function cycleCreateMutation(CycleCreateInput $input)
	{
		return $this->linearObjectMutation('cycleCreateMutation', CyclePayload::class, compact('input'));
	}
	
	/**
	 * @param CycleUpdateInput $input A partial cycle object to update the cycle with.
	 * @param string $id The identifier of the cycle to update.
	 * @returns PendingLinearObjectRequest<CyclePayload>
	 */
	function cycleUpdateMutation(CycleUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('cycleUpdateMutation', CyclePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the cycle to archive.
	 * @returns PendingLinearObjectRequest<CycleArchivePayload>
	 */
	function cycleArchiveMutation(string $id)
	{
		return $this->linearObjectMutation('cycleArchiveMutation', CycleArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param CycleShiftAllInput $input A partial cycle object to update the cycle with.
	 * @returns PendingLinearObjectRequest<CyclePayload>
	 */
	function cycleShiftAllMutation(CycleShiftAllInput $input)
	{
		return $this->linearObjectMutation('cycleShiftAllMutation', CyclePayload::class, compact('input'));
	}
	
	/**
	 * @param DocumentCreateInput $input The document to create.
	 * @returns PendingLinearObjectRequest<DocumentPayload>
	 */
	function documentCreateMutation(DocumentCreateInput $input)
	{
		return $this->linearObjectMutation('documentCreateMutation', DocumentPayload::class, compact('input'));
	}
	
	/**
	 * @param DocumentUpdateInput $input A partial document object to update the document with.
	 * @param string $id The identifier of the document to update. Also the identifier from the URL is accepted.
	 * @returns PendingLinearObjectRequest<DocumentPayload>
	 */
	function documentUpdateMutation(DocumentUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('documentUpdateMutation', DocumentPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the document to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function documentDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('documentDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param EmailIntakeAddressCreateInput $input The email intake address object to create.
	 * @returns PendingLinearObjectRequest<EmailIntakeAddressPayload>
	 */
	function emailIntakeAddressCreateMutation(EmailIntakeAddressCreateInput $input)
	{
		return $this->linearObjectMutation('emailIntakeAddressCreateMutation', EmailIntakeAddressPayload::class, compact('input'));
	}
	
	/**
	 * @param string $id The identifier of the email intake address.
	 * @returns PendingLinearObjectRequest<EmailIntakeAddressPayload>
	 */
	function emailIntakeAddressRotateMutation(string $id)
	{
		return $this->linearObjectMutation('emailIntakeAddressRotateMutation', EmailIntakeAddressPayload::class, compact('id'));
	}
	
	/**
	 * @param EmailIntakeAddressUpdateInput $input The properties of the email intake address to update.
	 * @param string $id The identifier of the email intake address.
	 * @returns PendingLinearObjectRequest<EmailIntakeAddressPayload>
	 */
	function emailIntakeAddressUpdateMutation(EmailIntakeAddressUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('emailIntakeAddressUpdateMutation', EmailIntakeAddressPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the email intake address to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function emailIntakeAddressDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('emailIntakeAddressDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param EmailUnsubscribeInput $input Unsubscription details.
	 * @returns PendingLinearObjectRequest<EmailUnsubscribePayload>
	 */
	function emailUnsubscribeMutation(EmailUnsubscribeInput $input)
	{
		return $this->linearObjectMutation('emailUnsubscribeMutation', EmailUnsubscribePayload::class, compact('input'));
	}
	
	/**
	 * @param EmojiCreateInput $input The emoji object to create.
	 * @returns PendingLinearObjectRequest<EmojiPayload>
	 */
	function emojiCreateMutation(EmojiCreateInput $input)
	{
		return $this->linearObjectMutation('emojiCreateMutation', EmojiPayload::class, compact('input'));
	}
	
	/**
	 * @param string $id The identifier of the emoji to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function emojiDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('emojiDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param InitiativeToProjectCreateInput $input The properties of the initiativeToProject to create.
	 * @returns PendingLinearObjectRequest<InitiativeToProjectPayload>
	 */
	function initiativeToProjectCreateMutation(InitiativeToProjectCreateInput $input)
	{
		return $this->linearObjectMutation('initiativeToProjectCreateMutation', InitiativeToProjectPayload::class, compact('input'));
	}
	
	/**
	 * @param InitiativeToProjectUpdateInput $input The properties of the initiativeToProject to update.
	 * @param string $id The identifier of the initiativeToProject to update.
	 * @returns PendingLinearObjectRequest<InitiativeToProjectPayload>
	 */
	function initiativeToProjectUpdateMutation(InitiativeToProjectUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('initiativeToProjectUpdateMutation', InitiativeToProjectPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the initiativeToProject to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function initiativeToProjectDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('initiativeToProjectDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param InitiativeCreateInput $input The properties of the initiative to create.
	 * @returns PendingLinearObjectRequest<InitiativePayload>
	 */
	function initiativeCreateMutation(InitiativeCreateInput $input)
	{
		return $this->linearObjectMutation('initiativeCreateMutation', InitiativePayload::class, compact('input'));
	}
	
	/**
	 * @param InitiativeUpdateInput $input The properties of the initiative to update.
	 * @param string $id The identifier of the initiative to update.
	 * @returns PendingLinearObjectRequest<InitiativePayload>
	 */
	function initiativeUpdateMutation(InitiativeUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('initiativeUpdateMutation', InitiativePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the initiative to archive.
	 * @returns PendingLinearObjectRequest<InitiativeArchivePayload>
	 */
	function initiativeArchiveMutation(string $id)
	{
		return $this->linearObjectMutation('initiativeArchiveMutation', InitiativeArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the initiative to unarchive.
	 * @returns PendingLinearObjectRequest<InitiativeArchivePayload>
	 */
	function initiativeUnarchiveMutation(string $id)
	{
		return $this->linearObjectMutation('initiativeUnarchiveMutation', InitiativeArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the initiative to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function initiativeDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('initiativeDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param FavoriteCreateInput $input The favorite object to create.
	 * @returns PendingLinearObjectRequest<FavoritePayload>
	 */
	function favoriteCreateMutation(FavoriteCreateInput $input)
	{
		return $this->linearObjectMutation('favoriteCreateMutation', FavoritePayload::class, compact('input'));
	}
	
	/**
	 * @param FavoriteUpdateInput $input A partial favorite object to update the favorite with.
	 * @param string $id The identifier of the favorite to update.
	 * @returns PendingLinearObjectRequest<FavoritePayload>
	 */
	function favoriteUpdateMutation(FavoriteUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('favoriteUpdateMutation', FavoritePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the favorite reference to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function favoriteDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('favoriteDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param ?string $metaData Optional metadata.
	 * @param ?bool $makePublic Should the file be made publicly accessible (default: false).
	 * @param int $size File size of the uploaded file.
	 * @param string $contentType MIME type of the uploaded file.
	 * @param string $filename Filename of the uploaded file.
	 * @returns PendingLinearObjectRequest<UploadPayload>
	 */
	function fileUploadMutation(int $size, string $contentType, string $filename, ?string $metaData = null, ?bool $makePublic = null)
	{
		return $this->linearObjectMutation('fileUploadMutation', UploadPayload::class, compact('size', 'contentType', 'filename', 'metaData', 'makePublic'));
	}
	
	/**
	 * @param ?string $metaData Optional metadata.
	 * @param int $size File size of the uploaded file.
	 * @param string $contentType MIME type of the uploaded file.
	 * @param string $filename Filename of the uploaded file.
	 * @returns PendingLinearObjectRequest<UploadPayload>
	 */
	function importFileUploadMutation(int $size, string $contentType, string $filename, ?string $metaData = null)
	{
		return $this->linearObjectMutation('importFileUploadMutation', UploadPayload::class, compact('size', 'contentType', 'filename', 'metaData'));
	}
	
	/**
	 * @param string $url URL of the file to be uploaded to Linear.
	 * @returns PendingLinearObjectRequest<ImageUploadFromUrlPayload>
	 */
	function imageUploadFromUrlMutation(string $url)
	{
		return $this->linearObjectMutation('imageUploadFromUrlMutation', ImageUploadFromUrlPayload::class, compact('url'));
	}
	
	/**
	 * @param GitAutomationStateCreateInput $input The automation state to create.
	 * @returns PendingLinearObjectRequest<GitAutomationStatePayload>
	 */
	function gitAutomationStateCreateMutation(GitAutomationStateCreateInput $input)
	{
		return $this->linearObjectMutation('gitAutomationStateCreateMutation', GitAutomationStatePayload::class, compact('input'));
	}
	
	/**
	 * @param GitAutomationStateUpdateInput $input The state to update.
	 * @param string $id The identifier of the state to update.
	 * @returns PendingLinearObjectRequest<GitAutomationStatePayload>
	 */
	function gitAutomationStateUpdateMutation(GitAutomationStateUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('gitAutomationStateUpdateMutation', GitAutomationStatePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the automation state to archive.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function gitAutomationStateDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('gitAutomationStateDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param GitAutomationTargetBranchCreateInput $input The Git target branch automation to create.
	 * @returns PendingLinearObjectRequest<GitAutomationTargetBranchPayload>
	 */
	function gitAutomationTargetBranchCreateMutation(GitAutomationTargetBranchCreateInput $input)
	{
		return $this->linearObjectMutation('gitAutomationTargetBranchCreateMutation', GitAutomationTargetBranchPayload::class, compact('input'));
	}
	
	/**
	 * @param GitAutomationTargetBranchUpdateInput $input The updates.
	 * @param string $id The identifier of the Git target branch automation to update.
	 * @returns PendingLinearObjectRequest<GitAutomationTargetBranchPayload>
	 */
	function gitAutomationTargetBranchUpdateMutation(GitAutomationTargetBranchUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('gitAutomationTargetBranchUpdateMutation', GitAutomationTargetBranchPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the Git target branch automation to archive.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function gitAutomationTargetBranchDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('gitAutomationTargetBranchDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param IntegrationRequestInput $input Integration request details.
	 * @returns PendingLinearObjectRequest<IntegrationRequestPayload>
	 */
	function integrationRequestMutation(IntegrationRequestInput $input)
	{
		return $this->linearObjectMutation('integrationRequestMutation', IntegrationRequestPayload::class, compact('input'));
	}
	
	/**
	 * @param IntegrationSettingsInput $input An integration settings object.
	 * @param string $id The identifier of the integration to update.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationSettingsUpdateMutation(IntegrationSettingsInput $input, string $id)
	{
		return $this->linearObjectMutation('integrationSettingsUpdateMutation', IntegrationPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<GitHubCommitIntegrationPayload>
	 */
	function integrationGithubCommitCreateMutation()
	{
		return $this->linearObjectMutation('integrationGithubCommitCreateMutation', GitHubCommitIntegrationPayload::class);
	}
	
	/**
	 * @param string $installationId The GitHub data to connect with.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationGithubConnectMutation(string $installationId)
	{
		return $this->linearObjectMutation('integrationGithubConnectMutation', IntegrationPayload::class, compact('installationId'));
	}
	
	/**
	 * @param string $gitlabUrl The URL of the GitLab installation.
	 * @param string $accessToken The GitLab Access Token to connect with.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationGitlabConnectMutation(string $gitlabUrl, string $accessToken)
	{
		return $this->linearObjectMutation('integrationGitlabConnectMutation', IntegrationPayload::class, compact('gitlabUrl', 'accessToken'));
	}
	
	/**
	 * @param AirbyteConfigurationInput $input Airbyte integration settings.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function airbyteIntegrationConnectMutation(AirbyteConfigurationInput $input)
	{
		return $this->linearObjectMutation('airbyteIntegrationConnectMutation', IntegrationPayload::class, compact('input'));
	}
	
	/**
	 * @param string $code [Internal] The Google OAuth code.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationGoogleCalendarPersonalConnectMutation(string $code)
	{
		return $this->linearObjectMutation('integrationGoogleCalendarPersonalConnectMutation', IntegrationPayload::class, compact('code'));
	}
	
	/**
	 * @param JiraConfigurationInput $input Jira integration settings.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function jiraIntegrationConnectMutation(JiraConfigurationInput $input)
	{
		return $this->linearObjectMutation('jiraIntegrationConnectMutation', IntegrationPayload::class, compact('input'));
	}
	
	/**
	 * @param JiraUpdateInput $input Jira integration update input.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationJiraUpdateMutation(JiraUpdateInput $input)
	{
		return $this->linearObjectMutation('integrationJiraUpdateMutation', IntegrationPayload::class, compact('input'));
	}
	
	/**
	 * @param ?string $code The Jira OAuth code, when connecting using OAuth.
	 * @param ?string $accessToken The Jira personal access token, when connecting using a PAT.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationJiraPersonalMutation(?string $code = null, ?string $accessToken = null)
	{
		return $this->linearObjectMutation('integrationJiraPersonalMutation', IntegrationPayload::class, compact('code', 'accessToken'));
	}
	
	/**
	 * @param string $code The GitHub OAuth code.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationGitHubPersonalMutation(string $code)
	{
		return $this->linearObjectMutation('integrationGitHubPersonalMutation', IntegrationPayload::class, compact('code'));
	}
	
	/**
	 * @param ?string $domainUrl The Intercom domain URL to use for the integration. Defaults to app.intercom.com if not provided.
	 * @param string $redirectUri The Intercom OAuth redirect URI.
	 * @param string $code The Intercom OAuth code.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationIntercomMutation(string $redirectUri, string $code, ?string $domainUrl = null)
	{
		return $this->linearObjectMutation('integrationIntercomMutation', IntegrationPayload::class, compact('redirectUri', 'code', 'domainUrl'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationIntercomDeleteMutation()
	{
		return $this->linearObjectMutation('integrationIntercomDeleteMutation', IntegrationPayload::class);
	}
	
	/**
	 * @param IntercomSettingsInput $input A partial Intercom integration settings object to update the integration settings with.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationIntercomSettingsUpdateMutation(IntercomSettingsInput $input)
	{
		return $this->linearObjectMutation('integrationIntercomSettingsUpdateMutation', IntegrationPayload::class, compact('input'));
	}
	
	/**
	 * @param string $redirectUri The Discord OAuth redirect URI.
	 * @param string $code The Discord OAuth code.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationDiscordMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('integrationDiscordMutation', IntegrationPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param string $apiKey The Opsgenie API key.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationOpsgenieConnectMutation(string $apiKey)
	{
		return $this->linearObjectMutation('integrationOpsgenieConnectMutation', IntegrationPayload::class, compact('apiKey'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationOpsgenieRefreshScheduleMappingsMutation()
	{
		return $this->linearObjectMutation('integrationOpsgenieRefreshScheduleMappingsMutation', IntegrationPayload::class);
	}
	
	/**
	 * @param string $code The PagerDuty OAuth code.
	 * @param string $redirectUri The PagerDuty OAuth redirect URI.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationPagerDutyConnectMutation(string $code, string $redirectUri)
	{
		return $this->linearObjectMutation('integrationPagerDutyConnectMutation', IntegrationPayload::class, compact('code', 'redirectUri'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationPagerDutyRefreshScheduleMappingsMutation()
	{
		return $this->linearObjectMutation('integrationPagerDutyRefreshScheduleMappingsMutation', IntegrationPayload::class);
	}
	
	/**
	 * @param string $redirectUri The Slack OAuth redirect URI.
	 * @param string $code The Slack OAuth code.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationUpdateSlackMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('integrationUpdateSlackMutation', IntegrationPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param ?bool $shouldUseV2Auth [DEPRECATED] Whether or not v2 of Slack OAuth should be used. No longer used.
	 * @param string $redirectUri The Slack OAuth redirect URI.
	 * @param string $code The Slack OAuth code.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationSlackMutation(string $redirectUri, string $code, ?bool $shouldUseV2Auth = null)
	{
		return $this->linearObjectMutation('integrationSlackMutation', IntegrationPayload::class, compact('redirectUri', 'code', 'shouldUseV2Auth'));
	}
	
	/**
	 * @param string $redirectUri The Slack OAuth redirect URI.
	 * @param string $code The Slack OAuth code.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationSlackAsksMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('integrationSlackAsksMutation', IntegrationPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param string $redirectUri The Slack OAuth redirect URI.
	 * @param string $code The Slack OAuth code.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationSlackPersonalMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('integrationSlackPersonalMutation', IntegrationPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param string $redirectUri The Slack OAuth redirect URI.
	 * @param string $code The Slack OAuth code.
	 * @returns PendingLinearObjectRequest<AsksChannelConnectPayload>
	 */
	function integrationAsksConnectChannelMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('integrationAsksConnectChannelMutation', AsksChannelConnectPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param ?bool $shouldUseV2Auth [DEPRECATED] Whether or not v2 of Slack OAuth should be used. No longer used.
	 * @param string $redirectUri The Slack OAuth redirect URI.
	 * @param string $teamId Integration's associated team.
	 * @param string $code The Slack OAuth code.
	 * @returns PendingLinearObjectRequest<SlackChannelConnectPayload>
	 */
	function integrationSlackPostMutation(string $redirectUri, string $teamId, string $code, ?bool $shouldUseV2Auth = null)
	{
		return $this->linearObjectMutation('integrationSlackPostMutation', SlackChannelConnectPayload::class, compact('redirectUri', 'teamId', 'code', 'shouldUseV2Auth'));
	}
	
	/**
	 * @param string $service The service to enable once connected, either 'notifications' or 'updates'.
	 * @param string $redirectUri The Slack OAuth redirect URI.
	 * @param string $projectId Integration's associated project.
	 * @param string $code The Slack OAuth code.
	 * @returns PendingLinearObjectRequest<SlackChannelConnectPayload>
	 */
	function integrationSlackProjectPostMutation(string $service, string $redirectUri, string $projectId, string $code)
	{
		return $this->linearObjectMutation('integrationSlackProjectPostMutation', SlackChannelConnectPayload::class, compact('service', 'redirectUri', 'projectId', 'code'));
	}
	
	/**
	 * @param string $redirectUri The Slack OAuth redirect URI.
	 * @param string $code The Slack OAuth code.
	 * @returns PendingLinearObjectRequest<SlackChannelConnectPayload>
	 */
	function integrationSlackOrgProjectUpdatesPostMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('integrationSlackOrgProjectUpdatesPostMutation', SlackChannelConnectPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param string $redirectUri The Slack OAuth redirect URI.
	 * @param string $code The Slack OAuth code.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationSlackImportEmojisMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('integrationSlackImportEmojisMutation', IntegrationPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param string $redirectUri The Figma OAuth redirect URI.
	 * @param string $code The Figma OAuth code.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationFigmaMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('integrationFigmaMutation', IntegrationPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param string $code The Google OAuth code.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationGoogleSheetsMutation(string $code)
	{
		return $this->linearObjectMutation('integrationGoogleSheetsMutation', IntegrationPayload::class, compact('code'));
	}
	
	/**
	 * @param string $id The identifier of the Google Sheets integration to update.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function refreshGoogleSheetsDataMutation(string $id)
	{
		return $this->linearObjectMutation('refreshGoogleSheetsDataMutation', IntegrationPayload::class, compact('id'));
	}
	
	/**
	 * @param string $organizationSlug The slug of the Sentry organization being connected.
	 * @param string $code The Sentry grant code that's exchanged for OAuth tokens.
	 * @param string $installationId The Sentry installationId to connect with.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationSentryConnectMutation(string $organizationSlug, string $code, string $installationId)
	{
		return $this->linearObjectMutation('integrationSentryConnectMutation', IntegrationPayload::class, compact('organizationSlug', 'code', 'installationId'));
	}
	
	/**
	 * @param string $redirectUri The Front OAuth redirect URI.
	 * @param string $code The Front OAuth code.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationFrontMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('integrationFrontMutation', IntegrationPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param string $subdomain The Zendesk installation subdomain.
	 * @param string $code The Zendesk OAuth code.
	 * @param string $scope The Zendesk OAuth scopes.
	 * @param string $redirectUri The Zendesk OAuth redirect URI.
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationZendeskMutation(string $subdomain, string $code, string $scope, string $redirectUri)
	{
		return $this->linearObjectMutation('integrationZendeskMutation', IntegrationPayload::class, compact('subdomain', 'code', 'scope', 'redirectUri'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	function integrationLoomMutation()
	{
		return $this->linearObjectMutation('integrationLoomMutation', IntegrationPayload::class);
	}
	
	/**
	 * @param string $id The identifier of the integration to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function integrationDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('integrationDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the integration to archive.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function integrationArchiveMutation(string $id)
	{
		return $this->linearObjectMutation('integrationArchiveMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param IntegrationsSettingsCreateInput $input The settings to create.
	 * @returns PendingLinearObjectRequest<IntegrationsSettingsPayload>
	 */
	function integrationsSettingsCreateMutation(IntegrationsSettingsCreateInput $input)
	{
		return $this->linearObjectMutation('integrationsSettingsCreateMutation', IntegrationsSettingsPayload::class, compact('input'));
	}
	
	/**
	 * @param IntegrationsSettingsUpdateInput $input A settings object to update the settings with.
	 * @param string $id The identifier of the settings to update.
	 * @returns PendingLinearObjectRequest<IntegrationsSettingsPayload>
	 */
	function integrationsSettingsUpdateMutation(IntegrationsSettingsUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('integrationsSettingsUpdateMutation', IntegrationsSettingsPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param IntegrationTemplateCreateInput $input The properties of the integrationTemplate to create.
	 * @returns PendingLinearObjectRequest<IntegrationTemplatePayload>
	 */
	function integrationTemplateCreateMutation(IntegrationTemplateCreateInput $input)
	{
		return $this->linearObjectMutation('integrationTemplateCreateMutation', IntegrationTemplatePayload::class, compact('input'));
	}
	
	/**
	 * @param string $id The identifier of the integrationTemplate to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function integrationTemplateDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('integrationTemplateDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param ?string $organizationId ID of the organization into which to import data.
	 * @param ?string $teamId ID of the team into which to import data.
	 * @param ?string $teamName Name of new team. When teamId is not set.
	 * @param string $githubToken GitHub token to fetch information from the GitHub API.
	 * @param string $githubRepoName GitHub repository name from which we will import data.
	 * @param string $githubRepoOwner GitHub owner (user or org) for the repository from which we will import data.
	 * @param ?bool $githubShouldImportOrgProjects Whether or not we should import GitHub organization level projects.
	 * @param ?bool $instantProcess Whether to instantly process the import with the default configuration mapping.
	 * @param ?bool $includeClosedIssues Whether or not we should collect the data for closed issues.
	 * @param ?string $id ID of issue import. If not provided it will be generated.
	 * @returns PendingLinearObjectRequest<IssueImportPayload>
	 */
	function issueImportCreateGithubMutation(
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
	) {
		return $this->linearObjectMutation('issueImportCreateGithubMutation', IssueImportPayload::class, compact('githubToken', 'githubRepoName', 'githubRepoOwner', 'organizationId', 'teamId', 'teamName', 'githubShouldImportOrgProjects', 'instantProcess', 'includeClosedIssues', 'id'));
	}
	
	/**
	 * @param ?string $organizationId ID of the organization into which to import data.
	 * @param ?string $teamId ID of the team into which to import data. Empty to create new team.
	 * @param ?string $teamName Name of new team. When teamId is not set.
	 * @param string $jiraToken Jira personal access token to access Jira REST API.
	 * @param string $jiraProject Jira project key from which we will import data.
	 * @param string $jiraEmail Jira user account email.
	 * @param string $jiraHostname Jira installation or cloud hostname.
	 * @param ?bool $instantProcess Whether to instantly process the import with the default configuration mapping.
	 * @param ?bool $includeClosedIssues Whether or not we should collect the data for closed issues.
	 * @param ?string $id ID of issue import. If not provided it will be generated.
	 * @returns PendingLinearObjectRequest<IssueImportPayload>
	 */
	function issueImportCreateJiraMutation(
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
	) {
		return $this->linearObjectMutation('issueImportCreateJiraMutation', IssueImportPayload::class, compact('jiraToken', 'jiraProject', 'jiraEmail', 'jiraHostname', 'organizationId', 'teamId', 'teamName', 'instantProcess', 'includeClosedIssues', 'id'));
	}
	
	/**
	 * @param ?string $organizationId ID of the organization into which to import data.
	 * @param ?string $teamId ID of the team into which to import data. Empty to create new team.
	 * @param ?string $teamName Name of new team. When teamId is not set.
	 * @param string $csvUrl URL for the CSV.
	 * @param ?string $jiraHostname Jira installation or cloud hostname.
	 * @param ?string $jiraToken Jira personal access token to access Jira REST API.
	 * @param ?string $jiraEmail Jira user account email.
	 * @returns PendingLinearObjectRequest<IssueImportPayload>
	 */
	function issueImportCreateCSVJiraMutation(
		string $csvUrl,
		?string $organizationId = null,
		?string $teamId = null,
		?string $teamName = null,
		?string $jiraHostname = null,
		?string $jiraToken = null,
		?string $jiraEmail = null
	) {
		return $this->linearObjectMutation('issueImportCreateCSVJiraMutation', IssueImportPayload::class, compact('csvUrl', 'organizationId', 'teamId', 'teamName', 'jiraHostname', 'jiraToken', 'jiraEmail'));
	}
	
	/**
	 * @param ?string $organizationId ID of the organization into which to import data.
	 * @param ?string $teamId ID of the team into which to import data.
	 * @param ?string $teamName Name of new team. When teamId is not set.
	 * @param string $clubhouseToken Shortcut (formerly Clubhouse) token to fetch information from the Clubhouse API.
	 * @param string $clubhouseGroupName Shortcut (formerly Clubhouse) group name to choose which issues we should import.
	 * @param ?bool $instantProcess Whether to instantly process the import with the default configuration mapping.
	 * @param ?bool $includeClosedIssues Whether or not we should collect the data for closed issues.
	 * @param ?string $id ID of issue import. If not provided it will be generated.
	 * @returns PendingLinearObjectRequest<IssueImportPayload>
	 */
	function issueImportCreateClubhouseMutation(
		string $clubhouseToken,
		string $clubhouseGroupName,
		?string $organizationId = null,
		?string $teamId = null,
		?string $teamName = null,
		?bool $instantProcess = null,
		?bool $includeClosedIssues = null,
		?string $id = null
	) {
		return $this->linearObjectMutation('issueImportCreateClubhouseMutation', IssueImportPayload::class, compact('clubhouseToken', 'clubhouseGroupName', 'organizationId', 'teamId', 'teamName', 'instantProcess', 'includeClosedIssues', 'id'));
	}
	
	/**
	 * @param ?string $organizationId ID of the organization into which to import data.
	 * @param ?string $teamId ID of the team into which to import data.
	 * @param ?string $teamName Name of new team. When teamId is not set.
	 * @param string $asanaToken Asana token to fetch information from the Asana API.
	 * @param string $asanaTeamName Asana team name to choose which issues we should import.
	 * @param ?bool $instantProcess Whether to instantly process the import with the default configuration mapping.
	 * @param ?bool $includeClosedIssues Whether or not we should collect the data for closed issues.
	 * @param ?string $id ID of issue import. If not provided it will be generated.
	 * @returns PendingLinearObjectRequest<IssueImportPayload>
	 */
	function issueImportCreateAsanaMutation(
		string $asanaToken,
		string $asanaTeamName,
		?string $organizationId = null,
		?string $teamId = null,
		?string $teamName = null,
		?bool $instantProcess = null,
		?bool $includeClosedIssues = null,
		?string $id = null
	) {
		return $this->linearObjectMutation('issueImportCreateAsanaMutation', IssueImportPayload::class, compact('asanaToken', 'asanaTeamName', 'organizationId', 'teamId', 'teamName', 'instantProcess', 'includeClosedIssues', 'id'));
	}
	
	/**
	 * @param string $issueImportId ID of the issue import to delete.
	 * @returns PendingLinearObjectRequest<IssueImportDeletePayload>
	 */
	function issueImportDeleteMutation(string $issueImportId)
	{
		return $this->linearObjectMutation('issueImportDeleteMutation', IssueImportDeletePayload::class, compact('issueImportId'));
	}
	
	/**
	 * @param string $mapping The mapping configuration to use for processing the import.
	 * @param string $issueImportId ID of the issue import which we're going to process.
	 * @returns PendingLinearObjectRequest<IssueImportPayload>
	 */
	function issueImportProcessMutation(string $mapping, string $issueImportId)
	{
		return $this->linearObjectMutation('issueImportProcessMutation', IssueImportPayload::class, compact('mapping', 'issueImportId'));
	}
	
	/**
	 * @param IssueImportUpdateInput $input The properties of the issue import to update.
	 * @param string $id The identifier of the issue import.
	 * @returns PendingLinearObjectRequest<IssueImportPayload>
	 */
	function issueImportUpdateMutation(IssueImportUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('issueImportUpdateMutation', IssueImportPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param ?bool $replaceTeamLabels Whether to replace all team-specific labels with the same name with this newly created workspace label.
	 * @param IssueLabelCreateInput $input The issue label to create.
	 * @returns PendingLinearObjectRequest<IssueLabelPayload>
	 */
	function issueLabelCreateMutation(IssueLabelCreateInput $input, ?bool $replaceTeamLabels = null)
	{
		return $this->linearObjectMutation('issueLabelCreateMutation', IssueLabelPayload::class, compact('input', 'replaceTeamLabels'));
	}
	
	/**
	 * @param IssueLabelUpdateInput $input A partial label object to update.
	 * @param string $id The identifier of the label to update.
	 * @returns PendingLinearObjectRequest<IssueLabelPayload>
	 */
	function issueLabelUpdateMutation(IssueLabelUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('issueLabelUpdateMutation', IssueLabelPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the label to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function issueLabelDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('issueLabelDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param IssueRelationCreateInput $input The issue relation to create.
	 * @returns PendingLinearObjectRequest<IssueRelationPayload>
	 */
	function issueRelationCreateMutation(IssueRelationCreateInput $input)
	{
		return $this->linearObjectMutation('issueRelationCreateMutation', IssueRelationPayload::class, compact('input'));
	}
	
	/**
	 * @param IssueRelationUpdateInput $input The properties of the issue relation to update.
	 * @param string $id The identifier of the issue relation to update.
	 * @returns PendingLinearObjectRequest<IssueRelationPayload>
	 */
	function issueRelationUpdateMutation(IssueRelationUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('issueRelationUpdateMutation', IssueRelationPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the issue relation to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function issueRelationDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('issueRelationDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param IssueCreateInput $input The issue object to create.
	 * @returns PendingLinearObjectRequest<IssuePayload>
	 */
	function issueCreateMutation(IssueCreateInput $input)
	{
		return $this->linearObjectMutation('issueCreateMutation', IssuePayload::class, compact('input'));
	}
	
	/**
	 * @param IssueUpdateInput $input A partial issue object to update the issue with.
	 * @param string $id The identifier of the issue to update.
	 * @returns PendingLinearObjectRequest<IssuePayload>
	 */
	function issueUpdateMutation(IssueUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('issueUpdateMutation', IssuePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param IssueUpdateInput $input A partial issue object to update the issues with.
	 * @param iterable $ids The id's of the issues to update. Can't be more than 50 at a time.
	 * @returns PendingLinearObjectRequest<IssueBatchPayload>
	 */
	function issueBatchUpdateMutation(IssueUpdateInput $input, iterable $ids)
	{
		return $this->linearObjectMutation('issueBatchUpdateMutation', IssueBatchPayload::class, compact('input', 'ids'));
	}
	
	/**
	 * @param ?bool $trash Whether to trash the issue.
	 * @param string $id The identifier of the issue to archive.
	 * @returns PendingLinearObjectRequest<IssueArchivePayload>
	 */
	function issueArchiveMutation(string $id, ?bool $trash = null)
	{
		return $this->linearObjectMutation('issueArchiveMutation', IssueArchivePayload::class, compact('id', 'trash'));
	}
	
	/**
	 * @param string $id The identifier of the issue to archive.
	 * @returns PendingLinearObjectRequest<IssueArchivePayload>
	 */
	function issueUnarchiveMutation(string $id)
	{
		return $this->linearObjectMutation('issueUnarchiveMutation', IssueArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the issue to delete.
	 * @returns PendingLinearObjectRequest<IssueArchivePayload>
	 */
	function issueDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('issueDeleteMutation', IssueArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param string $labelId The identifier of the label to add.
	 * @param string $id The identifier of the issue to add the label to.
	 * @returns PendingLinearObjectRequest<IssuePayload>
	 */
	function issueAddLabelMutation(string $labelId, string $id)
	{
		return $this->linearObjectMutation('issueAddLabelMutation', IssuePayload::class, compact('labelId', 'id'));
	}
	
	/**
	 * @param string $labelId The identifier of the label to remove.
	 * @param string $id The identifier of the issue to remove the label from.
	 * @returns PendingLinearObjectRequest<IssuePayload>
	 */
	function issueRemoveLabelMutation(string $labelId, string $id)
	{
		return $this->linearObjectMutation('issueRemoveLabelMutation', IssuePayload::class, compact('labelId', 'id'));
	}
	
	/**
	 * @param DateTimeInterface $reminderAt The time when a reminder notification will be sent.
	 * @param string $id The identifier of the issue to add a reminder for.
	 * @returns PendingLinearObjectRequest<IssuePayload>
	 */
	function issueReminderMutation(DateTimeInterface $reminderAt, string $id)
	{
		return $this->linearObjectMutation('issueReminderMutation', IssuePayload::class, compact('reminderAt', 'id'));
	}
	
	/**
	 * @param ?string $userId The identifier of the user to subscribe, default is the current user.
	 * @param string $id The identifier of the issue to subscribe to.
	 * @returns PendingLinearObjectRequest<IssuePayload>
	 */
	function issueSubscribeMutation(string $id, ?string $userId = null)
	{
		return $this->linearObjectMutation('issueSubscribeMutation', IssuePayload::class, compact('id', 'userId'));
	}
	
	/**
	 * @param ?string $userId The identifier of the user to unsubscribe, default is the current user.
	 * @param string $id The identifier of the issue to unsubscribe from.
	 * @returns PendingLinearObjectRequest<IssuePayload>
	 */
	function issueUnsubscribeMutation(string $id, ?string $userId = null)
	{
		return $this->linearObjectMutation('issueUnsubscribeMutation', IssuePayload::class, compact('id', 'userId'));
	}
	
	/**
	 * @param string $description Description to update the issue with.
	 * @param string $id The identifier of the issue to update.
	 * @returns PendingLinearObjectRequest<IssuePayload>
	 */
	function issueDescriptionUpdateFromFrontMutation(string $description, string $id)
	{
		return $this->linearObjectMutation('issueDescriptionUpdateFromFrontMutation', IssuePayload::class, compact('description', 'id'));
	}
	
	/**
	 * @param NotificationUpdateInput $input A partial notification object to update the notification with.
	 * @param string $id The identifier of the notification to update.
	 * @returns PendingLinearObjectRequest<NotificationPayload>
	 */
	function notificationUpdateMutation(NotificationUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('notificationUpdateMutation', NotificationPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param DateTimeInterface $readAt The time when notification was marked as read.
	 * @param NotificationEntityInput $input The type and id of the entity to archive notifications for.
	 * @returns PendingLinearObjectRequest<NotificationBatchActionPayload>
	 */
	function notificationMarkReadAllMutation(DateTimeInterface $readAt, NotificationEntityInput $input)
	{
		return $this->linearObjectMutation('notificationMarkReadAllMutation', NotificationBatchActionPayload::class, compact('readAt', 'input'));
	}
	
	/**
	 * @param NotificationEntityInput $input The type and id of the entity to archive notifications for.
	 * @returns PendingLinearObjectRequest<NotificationBatchActionPayload>
	 */
	function notificationMarkUnreadAllMutation(NotificationEntityInput $input)
	{
		return $this->linearObjectMutation('notificationMarkUnreadAllMutation', NotificationBatchActionPayload::class, compact('input'));
	}
	
	/**
	 * @param DateTimeInterface $snoozedUntilAt The time until a notification will be snoozed. After that it will appear in the inbox again.
	 * @param NotificationEntityInput $input The type and id of the entity to archive notifications for.
	 * @returns PendingLinearObjectRequest<NotificationBatchActionPayload>
	 */
	function notificationSnoozeAllMutation(DateTimeInterface $snoozedUntilAt, NotificationEntityInput $input)
	{
		return $this->linearObjectMutation('notificationSnoozeAllMutation', NotificationBatchActionPayload::class, compact('snoozedUntilAt', 'input'));
	}
	
	/**
	 * @param DateTimeInterface $unsnoozedAt The time when the notification was unsnoozed.
	 * @param NotificationEntityInput $input The type and id of the entity to archive notifications for.
	 * @returns PendingLinearObjectRequest<NotificationBatchActionPayload>
	 */
	function notificationUnsnoozeAllMutation(DateTimeInterface $unsnoozedAt, NotificationEntityInput $input)
	{
		return $this->linearObjectMutation('notificationUnsnoozeAllMutation', NotificationBatchActionPayload::class, compact('unsnoozedAt', 'input'));
	}
	
	/**
	 * @param string $id The id of the notification to archive.
	 * @returns PendingLinearObjectRequest<NotificationArchivePayload>
	 */
	function notificationArchiveMutation(string $id)
	{
		return $this->linearObjectMutation('notificationArchiveMutation', NotificationArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param NotificationEntityInput $input The type and id of the entity to archive notifications for.
	 * @returns PendingLinearObjectRequest<NotificationBatchActionPayload>
	 */
	function notificationArchiveAllMutation(NotificationEntityInput $input)
	{
		return $this->linearObjectMutation('notificationArchiveAllMutation', NotificationBatchActionPayload::class, compact('input'));
	}
	
	/**
	 * @param string $id The id of the notification to archive.
	 * @returns PendingLinearObjectRequest<NotificationArchivePayload>
	 */
	function notificationUnarchiveMutation(string $id)
	{
		return $this->linearObjectMutation('notificationUnarchiveMutation', NotificationArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param NotificationSubscriptionCreateInput $input The subscription object to create.
	 * @returns PendingLinearObjectRequest<NotificationSubscriptionPayload>
	 */
	function notificationSubscriptionCreateMutation(NotificationSubscriptionCreateInput $input)
	{
		return $this->linearObjectMutation('notificationSubscriptionCreateMutation', NotificationSubscriptionPayload::class, compact('input'));
	}
	
	/**
	 * @param NotificationSubscriptionUpdateInput $input A partial notification subscription object to update the notification subscription with.
	 * @param string $id The identifier of the notification subscription to update.
	 * @returns PendingLinearObjectRequest<NotificationSubscriptionPayload>
	 */
	function notificationSubscriptionUpdateMutation(NotificationSubscriptionUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('notificationSubscriptionUpdateMutation', NotificationSubscriptionPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the notification subscription reference to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function notificationSubscriptionDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('notificationSubscriptionDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The ID of the organization domain to claim.
	 * @returns PendingLinearObjectRequest<OrganizationDomainSimplePayload>
	 */
	function organizationDomainClaimMutation(string $id)
	{
		return $this->linearObjectMutation('organizationDomainClaimMutation', OrganizationDomainSimplePayload::class, compact('id'));
	}
	
	/**
	 * @param OrganizationDomainVerificationInput $input The organization domain to verify.
	 * @returns PendingLinearObjectRequest<OrganizationDomainPayload>
	 */
	function organizationDomainVerifyMutation(OrganizationDomainVerificationInput $input)
	{
		return $this->linearObjectMutation('organizationDomainVerifyMutation', OrganizationDomainPayload::class, compact('input'));
	}
	
	/**
	 * @param ?bool $triggerEmailVerification Whether to trigger an email verification flow during domain creation.
	 * @param OrganizationDomainCreateInput $input The organization domain entry to create.
	 * @returns PendingLinearObjectRequest<OrganizationDomainPayload>
	 */
	function organizationDomainCreateMutation(OrganizationDomainCreateInput $input, ?bool $triggerEmailVerification = null)
	{
		return $this->linearObjectMutation('organizationDomainCreateMutation', OrganizationDomainPayload::class, compact('input', 'triggerEmailVerification'));
	}
	
	/**
	 * @param string $id The identifier of the domain to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function organizationDomainDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('organizationDomainDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param OrganizationInviteCreateInput $input The organization invite object to create.
	 * @returns PendingLinearObjectRequest<OrganizationInvitePayload>
	 */
	function organizationInviteCreateMutation(OrganizationInviteCreateInput $input)
	{
		return $this->linearObjectMutation('organizationInviteCreateMutation', OrganizationInvitePayload::class, compact('input'));
	}
	
	/**
	 * @param OrganizationInviteUpdateInput $input The updates to make to the organization invite object.
	 * @param string $id The identifier of the organization invite to update.
	 * @returns PendingLinearObjectRequest<OrganizationInvitePayload>
	 */
	function organizationInviteUpdateMutation(OrganizationInviteUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('organizationInviteUpdateMutation', OrganizationInvitePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the organization invite to be re-send.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function resendOrganizationInviteMutation(string $id)
	{
		return $this->linearObjectMutation('resendOrganizationInviteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the organization invite to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function organizationInviteDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('organizationInviteDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param OrganizationUpdateInput $input A partial organization object to update the organization with.
	 * @returns PendingLinearObjectRequest<OrganizationPayload>
	 */
	function organizationUpdateMutation(OrganizationUpdateInput $input)
	{
		return $this->linearObjectMutation('organizationUpdateMutation', OrganizationPayload::class, compact('input'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<OrganizationDeletePayload>
	 */
	function organizationDeleteChallengeMutation()
	{
		return $this->linearObjectMutation('organizationDeleteChallengeMutation', OrganizationDeletePayload::class);
	}
	
	/**
	 * @param DeleteOrganizationInput $input Information required to delete an organization.
	 * @returns PendingLinearObjectRequest<OrganizationDeletePayload>
	 */
	function organizationDeleteMutation(DeleteOrganizationInput $input)
	{
		return $this->linearObjectMutation('organizationDeleteMutation', OrganizationDeletePayload::class, compact('input'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<OrganizationCancelDeletePayload>
	 */
	function organizationCancelDeleteMutation()
	{
		return $this->linearObjectMutation('organizationCancelDeleteMutation', OrganizationCancelDeletePayload::class);
	}
	
	/**
	 * @returns PendingLinearObjectRequest<OrganizationStartPlusTrialPayload>
	 */
	function organizationStartPlusTrialMutation()
	{
		return $this->linearObjectMutation('organizationStartPlusTrialMutation', OrganizationStartPlusTrialPayload::class);
	}
	
	/**
	 * @param ProjectLinkCreateInput $input The project link object to create.
	 * @returns PendingLinearObjectRequest<ProjectLinkPayload>
	 */
	function projectLinkCreateMutation(ProjectLinkCreateInput $input)
	{
		return $this->linearObjectMutation('projectLinkCreateMutation', ProjectLinkPayload::class, compact('input'));
	}
	
	/**
	 * @param ProjectLinkUpdateInput $input The project link object to update.
	 * @param string $id The identifier of the project link to update.
	 * @returns PendingLinearObjectRequest<ProjectLinkPayload>
	 */
	function projectLinkUpdateMutation(ProjectLinkUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('projectLinkUpdateMutation', ProjectLinkPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the project link to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function projectLinkDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('projectLinkDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param ProjectMilestoneCreateInput $input The project milestone to create.
	 * @returns PendingLinearObjectRequest<ProjectMilestonePayload>
	 */
	function projectMilestoneCreateMutation(ProjectMilestoneCreateInput $input)
	{
		return $this->linearObjectMutation('projectMilestoneCreateMutation', ProjectMilestonePayload::class, compact('input'));
	}
	
	/**
	 * @param ProjectMilestoneUpdateInput $input A partial object to update the project milestone with.
	 * @param string $id The identifier of the project milestone to update. Also the identifier from the URL is accepted.
	 * @returns PendingLinearObjectRequest<ProjectMilestonePayload>
	 */
	function projectMilestoneUpdateMutation(ProjectMilestoneUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('projectMilestoneUpdateMutation', ProjectMilestonePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the project milestone to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function projectMilestoneDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('projectMilestoneDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param ?bool $connectSlackChannel Whether to connect a Slack channel to the project.
	 * @param ProjectCreateInput $input The issue object to create.
	 * @returns PendingLinearObjectRequest<ProjectPayload>
	 */
	function projectCreateMutation(ProjectCreateInput $input, ?bool $connectSlackChannel = null)
	{
		return $this->linearObjectMutation('projectCreateMutation', ProjectPayload::class, compact('input', 'connectSlackChannel'));
	}
	
	/**
	 * @param ProjectUpdateInput $input A partial project object to update the project with.
	 * @param string $id The identifier of the project to update. Also the identifier from the URL is accepted.
	 * @returns PendingLinearObjectRequest<ProjectPayload>
	 */
	function projectUpdateMutation(ProjectUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('projectUpdateMutation', ProjectPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the project to delete.
	 * @returns PendingLinearObjectRequest<ProjectArchivePayload>
	 */
	function projectDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('projectDeleteMutation', ProjectArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param ?bool $trash Whether to trash the project.
	 * @param string $id The identifier of the project to archive. Also the identifier from the URL is accepted.
	 * @returns PendingLinearObjectRequest<ProjectArchivePayload>
	 */
	function projectArchiveMutation(string $id, ?bool $trash = null)
	{
		return $this->linearObjectMutation('projectArchiveMutation', ProjectArchivePayload::class, compact('id', 'trash'));
	}
	
	/**
	 * @param string $id The identifier of the project to restore. Also the identifier from the URL is accepted.
	 * @returns PendingLinearObjectRequest<ProjectArchivePayload>
	 */
	function projectUnarchiveMutation(string $id)
	{
		return $this->linearObjectMutation('projectUnarchiveMutation', ProjectArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param ProjectUpdateInteractionCreateInput $input Data for the project update interaction to create.
	 * @returns PendingLinearObjectRequest<ProjectUpdateInteractionPayload>
	 */
	function projectUpdateInteractionCreateMutation(ProjectUpdateInteractionCreateInput $input)
	{
		return $this->linearObjectMutation('projectUpdateInteractionCreateMutation', ProjectUpdateInteractionPayload::class, compact('input'));
	}
	
	/**
	 * @param ProjectUpdateCreateInput $input Data for the project update to create.
	 * @returns PendingLinearObjectRequest<ProjectUpdatePayload>
	 */
	function projectUpdateCreateMutation(ProjectUpdateCreateInput $input)
	{
		return $this->linearObjectMutation('projectUpdateCreateMutation', ProjectUpdatePayload::class, compact('input'));
	}
	
	/**
	 * @param ProjectUpdateUpdateInput $input A data to update the project update with.
	 * @param string $id The identifier of the project update to update.
	 * @returns PendingLinearObjectRequest<ProjectUpdatePayload>
	 */
	function projectUpdateUpdateMutation(ProjectUpdateUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('projectUpdateUpdateMutation', ProjectUpdatePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the project update to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function projectUpdateDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('projectUpdateDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the project update.
	 * @returns PendingLinearObjectRequest<ProjectUpdateWithInteractionPayload>
	 */
	function projectUpdateMarkAsReadMutation(string $id)
	{
		return $this->linearObjectMutation('projectUpdateMarkAsReadMutation', ProjectUpdateWithInteractionPayload::class, compact('id'));
	}
	
	/**
	 * @param ?string $userId The user identifier to whom the notification will be sent. By default, it is set to the project lead.
	 * @param string $projectId The identifier of the project to remind about.
	 * @returns PendingLinearObjectRequest<ProjectUpdateReminderPayload>
	 */
	function createProjectUpdateReminderMutation(string $projectId, ?string $userId = null)
	{
		return $this->linearObjectMutation('createProjectUpdateReminderMutation', ProjectUpdateReminderPayload::class, compact('projectId', 'userId'));
	}
	
	/**
	 * @param PushSubscriptionCreateInput $input The push subscription to create.
	 * @returns PendingLinearObjectRequest<PushSubscriptionPayload>
	 */
	function pushSubscriptionCreateMutation(PushSubscriptionCreateInput $input)
	{
		return $this->linearObjectMutation('pushSubscriptionCreateMutation', PushSubscriptionPayload::class, compact('input'));
	}
	
	/**
	 * @param string $id The identifier of the push subscription to delete.
	 * @returns PendingLinearObjectRequest<PushSubscriptionPayload>
	 */
	function pushSubscriptionDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('pushSubscriptionDeleteMutation', PushSubscriptionPayload::class, compact('id'));
	}
	
	/**
	 * @param ReactionCreateInput $input The reaction object to create.
	 * @returns PendingLinearObjectRequest<ReactionPayload>
	 */
	function reactionCreateMutation(ReactionCreateInput $input)
	{
		return $this->linearObjectMutation('reactionCreateMutation', ReactionPayload::class, compact('input'));
	}
	
	/**
	 * @param string $id The identifier of the reaction to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function reactionDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('reactionDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param ?iterable $includePrivateTeamIds
	 * @returns PendingLinearObjectRequest<CreateCsvExportReportPayload>
	 */
	function createCsvExportReportMutation(?iterable $includePrivateTeamIds = null)
	{
		return $this->linearObjectMutation('createCsvExportReportMutation', CreateCsvExportReportPayload::class, compact('includePrivateTeamIds'));
	}
	
	/**
	 * @param RoadmapCreateInput $input The properties of the roadmap to create.
	 * @returns PendingLinearObjectRequest<RoadmapPayload>
	 */
	function roadmapCreateMutation(RoadmapCreateInput $input)
	{
		return $this->linearObjectMutation('roadmapCreateMutation', RoadmapPayload::class, compact('input'));
	}
	
	/**
	 * @param RoadmapUpdateInput $input The properties of the roadmap to update.
	 * @param string $id The identifier of the roadmap to update.
	 * @returns PendingLinearObjectRequest<RoadmapPayload>
	 */
	function roadmapUpdateMutation(RoadmapUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('roadmapUpdateMutation', RoadmapPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the roadmap to archive.
	 * @returns PendingLinearObjectRequest<RoadmapArchivePayload>
	 */
	function roadmapArchiveMutation(string $id)
	{
		return $this->linearObjectMutation('roadmapArchiveMutation', RoadmapArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the roadmap to unarchive.
	 * @returns PendingLinearObjectRequest<RoadmapArchivePayload>
	 */
	function roadmapUnarchiveMutation(string $id)
	{
		return $this->linearObjectMutation('roadmapUnarchiveMutation', RoadmapArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the roadmap to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function roadmapDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('roadmapDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param RoadmapToProjectCreateInput $input The properties of the roadmapToProject to create.
	 * @returns PendingLinearObjectRequest<RoadmapToProjectPayload>
	 */
	function roadmapToProjectCreateMutation(RoadmapToProjectCreateInput $input)
	{
		return $this->linearObjectMutation('roadmapToProjectCreateMutation', RoadmapToProjectPayload::class, compact('input'));
	}
	
	/**
	 * @param RoadmapToProjectUpdateInput $input The properties of the roadmapToProject to update.
	 * @param string $id The identifier of the roadmapToProject to update.
	 * @returns PendingLinearObjectRequest<RoadmapToProjectPayload>
	 */
	function roadmapToProjectUpdateMutation(RoadmapToProjectUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('roadmapToProjectUpdateMutation', RoadmapToProjectPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the roadmapToProject to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function roadmapToProjectDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('roadmapToProjectDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the team key to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function teamKeyDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('teamKeyDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param TeamMembershipCreateInput $input The team membership object to create.
	 * @returns PendingLinearObjectRequest<TeamMembershipPayload>
	 */
	function teamMembershipCreateMutation(TeamMembershipCreateInput $input)
	{
		return $this->linearObjectMutation('teamMembershipCreateMutation', TeamMembershipPayload::class, compact('input'));
	}
	
	/**
	 * @param TeamMembershipUpdateInput $input A partial team membership object to update the team membership with.
	 * @param string $id The identifier of the team membership to update.
	 * @returns PendingLinearObjectRequest<TeamMembershipPayload>
	 */
	function teamMembershipUpdateMutation(TeamMembershipUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('teamMembershipUpdateMutation', TeamMembershipPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the team membership to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function teamMembershipDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('teamMembershipDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param ?string $copySettingsFromTeamId The team id to copy settings from.
	 * @param TeamCreateInput $input The team object to create.
	 * @returns PendingLinearObjectRequest<TeamPayload>
	 */
	function teamCreateMutation(TeamCreateInput $input, ?string $copySettingsFromTeamId = null)
	{
		return $this->linearObjectMutation('teamCreateMutation', TeamPayload::class, compact('input', 'copySettingsFromTeamId'));
	}
	
	/**
	 * @param TeamUpdateInput $input A partial team object to update the team with.
	 * @param string $id The identifier of the team to update.
	 * @returns PendingLinearObjectRequest<TeamPayload>
	 */
	function teamUpdateMutation(TeamUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('teamUpdateMutation', TeamPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the team to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function teamDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('teamDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the team to delete.
	 * @returns PendingLinearObjectRequest<TeamArchivePayload>
	 */
	function teamUnarchiveMutation(string $id)
	{
		return $this->linearObjectMutation('teamUnarchiveMutation', TeamArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the team, which cycles will be deleted.
	 * @returns PendingLinearObjectRequest<TeamPayload>
	 */
	function teamCyclesDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('teamCyclesDeleteMutation', TeamPayload::class, compact('id'));
	}
	
	/**
	 * @param TemplateCreateInput $input The template object to create.
	 * @returns PendingLinearObjectRequest<TemplatePayload>
	 */
	function templateCreateMutation(TemplateCreateInput $input)
	{
		return $this->linearObjectMutation('templateCreateMutation', TemplatePayload::class, compact('input'));
	}
	
	/**
	 * @param TemplateUpdateInput $input The properties of the template to update.
	 * @param string $id The identifier of the template.
	 * @returns PendingLinearObjectRequest<TemplatePayload>
	 */
	function templateUpdateMutation(TemplateUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('templateUpdateMutation', TemplatePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the template to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function templateDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('templateDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param TimeScheduleCreateInput $input The properties of the time schedule to create.
	 * @returns PendingLinearObjectRequest<TimeSchedulePayload>
	 */
	function timeScheduleCreateMutation(TimeScheduleCreateInput $input)
	{
		return $this->linearObjectMutation('timeScheduleCreateMutation', TimeSchedulePayload::class, compact('input'));
	}
	
	/**
	 * @param TimeScheduleUpdateInput $input The properties of the time schedule to update.
	 * @param string $id The identifier of the time schedule to update.
	 * @returns PendingLinearObjectRequest<TimeSchedulePayload>
	 */
	function timeScheduleUpdateMutation(TimeScheduleUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('timeScheduleUpdateMutation', TimeSchedulePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param TimeScheduleUpdateInput $input The properties of the time schedule to insert or update.
	 * @param string $externalId The unique identifier of the external schedule.
	 * @returns PendingLinearObjectRequest<TimeSchedulePayload>
	 */
	function timeScheduleUpsertExternalMutation(TimeScheduleUpdateInput $input, string $externalId)
	{
		return $this->linearObjectMutation('timeScheduleUpsertExternalMutation', TimeSchedulePayload::class, compact('input', 'externalId'));
	}
	
	/**
	 * @param string $id The identifier of the time schedule to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function timeScheduleDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('timeScheduleDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the time schedule to refresh.
	 * @returns PendingLinearObjectRequest<TimeSchedulePayload>
	 */
	function timeScheduleRefreshIntegrationScheduleMutation(string $id)
	{
		return $this->linearObjectMutation('timeScheduleRefreshIntegrationScheduleMutation', TimeSchedulePayload::class, compact('id'));
	}
	
	/**
	 * @param TriageResponsibilityCreateInput $input The properties of the triage responsibility to create.
	 * @returns PendingLinearObjectRequest<TriageResponsibilityPayload>
	 */
	function triageResponsibilityCreateMutation(TriageResponsibilityCreateInput $input)
	{
		return $this->linearObjectMutation('triageResponsibilityCreateMutation', TriageResponsibilityPayload::class, compact('input'));
	}
	
	/**
	 * @param TriageResponsibilityUpdateInput $input The properties of the triage responsibility to update.
	 * @param string $id The identifier of the triage responsibility to update.
	 * @returns PendingLinearObjectRequest<TriageResponsibilityPayload>
	 */
	function triageResponsibilityUpdateMutation(TriageResponsibilityUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('triageResponsibilityUpdateMutation', TriageResponsibilityPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the triage responsibility to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function triageResponsibilityDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('triageResponsibilityDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param UserUpdateInput $input A partial user object to update the user with.
	 * @param string $id The identifier of the user to update. Use `me` to reference currently authenticated user.
	 * @returns PendingLinearObjectRequest<UserPayload>
	 */
	function userUpdateMutation(UserUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('userUpdateMutation', UserPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $redirectUri The Discord OAuth redirect URI.
	 * @param string $code The Discord OAuth code.
	 * @returns PendingLinearObjectRequest<UserPayload>
	 */
	function userDiscordConnectMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('userDiscordConnectMutation', UserPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param string $service The external service to disconnect.
	 * @returns PendingLinearObjectRequest<UserPayload>
	 */
	function userExternalUserDisconnectMutation(string $service)
	{
		return $this->linearObjectMutation('userExternalUserDisconnectMutation', UserPayload::class, compact('service'));
	}
	
	/**
	 * @param string $id The identifier of the user to make an admin.
	 * @returns PendingLinearObjectRequest<UserAdminPayload>
	 */
	function userPromoteAdminMutation(string $id)
	{
		return $this->linearObjectMutation('userPromoteAdminMutation', UserAdminPayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the user to make a regular user.
	 * @returns PendingLinearObjectRequest<UserAdminPayload>
	 */
	function userDemoteAdminMutation(string $id)
	{
		return $this->linearObjectMutation('userDemoteAdminMutation', UserAdminPayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the user to make a regular user.
	 * @returns PendingLinearObjectRequest<UserAdminPayload>
	 */
	function userPromoteMemberMutation(string $id)
	{
		return $this->linearObjectMutation('userPromoteMemberMutation', UserAdminPayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the user to make a guest.
	 * @returns PendingLinearObjectRequest<UserAdminPayload>
	 */
	function userDemoteMemberMutation(string $id)
	{
		return $this->linearObjectMutation('userDemoteMemberMutation', UserAdminPayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the user to suspend.
	 * @returns PendingLinearObjectRequest<UserAdminPayload>
	 */
	function userSuspendMutation(string $id)
	{
		return $this->linearObjectMutation('userSuspendMutation', UserAdminPayload::class, compact('id'));
	}
	
	/**
	 * @param string $id The identifier of the user to unsuspend.
	 * @returns PendingLinearObjectRequest<UserAdminPayload>
	 */
	function userUnsuspendMutation(string $id)
	{
		return $this->linearObjectMutation('userUnsuspendMutation', UserAdminPayload::class, compact('id'));
	}
	
	/**
	 * @param UserSettingsUpdateInput $input A partial notification object to update the settings with.
	 * @param string $id The identifier of the userSettings to update.
	 * @returns PendingLinearObjectRequest<UserSettingsPayload>
	 */
	function userSettingsUpdateMutation(UserSettingsUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('userSettingsUpdateMutation', UserSettingsPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $flag Flag to increment.
	 * @returns PendingLinearObjectRequest<UserSettingsFlagPayload>
	 */
	function userSettingsFlagIncrementMutation(string $flag)
	{
		return $this->linearObjectMutation('userSettingsFlagIncrementMutation', UserSettingsFlagPayload::class, compact('flag'));
	}
	
	/**
	 * @param ?iterable $flags The flags to reset. If not provided all flags will be reset.
	 * @returns PendingLinearObjectRequest<UserSettingsFlagsResetPayload>
	 */
	function userSettingsFlagsResetMutation(?iterable $flags = null)
	{
		return $this->linearObjectMutation('userSettingsFlagsResetMutation', UserSettingsFlagsResetPayload::class, compact('flags'));
	}
	
	/**
	 * @param UserFlagUpdateOperation $operation Flag operation to perform.
	 * @param UserFlagType $flag Settings flag to increment.
	 * @returns PendingLinearObjectRequest<UserSettingsFlagPayload>
	 */
	function userFlagUpdateMutation(UserFlagUpdateOperation $operation, UserFlagType $flag)
	{
		return $this->linearObjectMutation('userFlagUpdateMutation', UserSettingsFlagPayload::class, compact('operation', 'flag'));
	}
	
	/**
	 * @param ViewPreferencesCreateInput $input The ViewPreferences object to create.
	 * @returns PendingLinearObjectRequest<ViewPreferencesPayload>
	 */
	function viewPreferencesCreateMutation(ViewPreferencesCreateInput $input)
	{
		return $this->linearObjectMutation('viewPreferencesCreateMutation', ViewPreferencesPayload::class, compact('input'));
	}
	
	/**
	 * @param ViewPreferencesUpdateInput $input The properties of the view preferences.
	 * @param string $id The identifier of the ViewPreferences object.
	 * @returns PendingLinearObjectRequest<ViewPreferencesPayload>
	 */
	function viewPreferencesUpdateMutation(ViewPreferencesUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('viewPreferencesUpdateMutation', ViewPreferencesPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the ViewPreferences to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function viewPreferencesDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('viewPreferencesDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param WebhookCreateInput $input The webhook object to create.
	 * @returns PendingLinearObjectRequest<WebhookPayload>
	 */
	function webhookCreateMutation(WebhookCreateInput $input)
	{
		return $this->linearObjectMutation('webhookCreateMutation', WebhookPayload::class, compact('input'));
	}
	
	/**
	 * @param WebhookUpdateInput $input The properties of the Webhook.
	 * @param string $id The identifier of the Webhook.
	 * @returns PendingLinearObjectRequest<WebhookPayload>
	 */
	function webhookUpdateMutation(WebhookUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('webhookUpdateMutation', WebhookPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the Webhook to delete.
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	function webhookDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('webhookDeleteMutation', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param WorkflowStateCreateInput $input The state to create.
	 * @returns PendingLinearObjectRequest<WorkflowStatePayload>
	 */
	function workflowStateCreateMutation(WorkflowStateCreateInput $input)
	{
		return $this->linearObjectMutation('workflowStateCreateMutation', WorkflowStatePayload::class, compact('input'));
	}
	
	/**
	 * @param WorkflowStateUpdateInput $input A partial state object to update.
	 * @param string $id The identifier of the state to update.
	 * @returns PendingLinearObjectRequest<WorkflowStatePayload>
	 */
	function workflowStateUpdateMutation(WorkflowStateUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('workflowStateUpdateMutation', WorkflowStatePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id The identifier of the state to archive.
	 * @returns PendingLinearObjectRequest<WorkflowStateArchivePayload>
	 */
	function workflowStateArchiveMutation(string $id)
	{
		return $this->linearObjectMutation('workflowStateArchiveMutation', WorkflowStateArchivePayload::class, compact('id'));
	}
}
