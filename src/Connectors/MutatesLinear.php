<?php

namespace Glhd\Linearavel\Connectors;

use DateTimeInterface;
use Glhd\Linearavel\Data\ApiKeyPayload;
use Glhd\Linearavel\Data\AsksChannelConnectPayload;
use Glhd\Linearavel\Data\AttachmentArchivePayload;
use Glhd\Linearavel\Data\AttachmentPayload;
use Glhd\Linearavel\Data\AuthResolverResponse;
use Glhd\Linearavel\Data\CommentPayload;
use Glhd\Linearavel\Data\ContactPayload;
use Glhd\Linearavel\Data\CreateCsvExportReportPayload;
use Glhd\Linearavel\Data\CreateOrJoinOrganizationResponse;
use Glhd\Linearavel\Data\CustomViewPayload;
use Glhd\Linearavel\Data\CycleArchivePayload;
use Glhd\Linearavel\Data\CyclePayload;
use Glhd\Linearavel\Data\DeletePayload;
use Glhd\Linearavel\Data\DocumentPayload;
use Glhd\Linearavel\Data\EmailIntakeAddressPayload;
use Glhd\Linearavel\Data\EmailUnsubscribePayload;
use Glhd\Linearavel\Data\EmailUserAccountAuthChallengeResponse;
use Glhd\Linearavel\Data\EmojiPayload;
use Glhd\Linearavel\Data\Enums\UserFlagType;
use Glhd\Linearavel\Data\Enums\UserFlagUpdateOperation;
use Glhd\Linearavel\Data\FavoritePayload;
use Glhd\Linearavel\Data\FrontAttachmentPayload;
use Glhd\Linearavel\Data\GitAutomationStatePayload;
use Glhd\Linearavel\Data\GitAutomationTargetBranchPayload;
use Glhd\Linearavel\Data\GitHubCommitIntegrationPayload;
use Glhd\Linearavel\Data\ImageUploadFromUrlPayload;
use Glhd\Linearavel\Data\InitiativeArchivePayload;
use Glhd\Linearavel\Data\InitiativePayload;
use Glhd\Linearavel\Data\InitiativeToProjectPayload;
use Glhd\Linearavel\Data\IntegrationPayload;
use Glhd\Linearavel\Data\IntegrationRequestPayload;
use Glhd\Linearavel\Data\IntegrationsSettingsPayload;
use Glhd\Linearavel\Data\IntegrationTemplatePayload;
use Glhd\Linearavel\Data\IssueArchivePayload;
use Glhd\Linearavel\Data\IssueBatchPayload;
use Glhd\Linearavel\Data\IssueImportDeletePayload;
use Glhd\Linearavel\Data\IssueImportPayload;
use Glhd\Linearavel\Data\IssueLabelPayload;
use Glhd\Linearavel\Data\IssuePayload;
use Glhd\Linearavel\Data\IssueRelationPayload;
use Glhd\Linearavel\Data\LogoutResponse;
use Glhd\Linearavel\Data\NotificationArchivePayload;
use Glhd\Linearavel\Data\NotificationBatchActionPayload;
use Glhd\Linearavel\Data\NotificationPayload;
use Glhd\Linearavel\Data\NotificationSubscriptionPayload;
use Glhd\Linearavel\Data\OrganizationCancelDeletePayload;
use Glhd\Linearavel\Data\OrganizationDeletePayload;
use Glhd\Linearavel\Data\OrganizationDomainPayload;
use Glhd\Linearavel\Data\OrganizationDomainSimplePayload;
use Glhd\Linearavel\Data\OrganizationInvitePayload;
use Glhd\Linearavel\Data\OrganizationPayload;
use Glhd\Linearavel\Data\OrganizationStartPlusTrialPayload;
use Glhd\Linearavel\Data\ProjectArchivePayload;
use Glhd\Linearavel\Data\ProjectLinkPayload;
use Glhd\Linearavel\Data\ProjectMilestonePayload;
use Glhd\Linearavel\Data\ProjectPayload;
use Glhd\Linearavel\Data\ProjectUpdateInteractionPayload;
use Glhd\Linearavel\Data\ProjectUpdatePayload;
use Glhd\Linearavel\Data\ProjectUpdateReminderPayload;
use Glhd\Linearavel\Data\ProjectUpdateWithInteractionPayload;
use Glhd\Linearavel\Data\PushSubscriptionPayload;
use Glhd\Linearavel\Data\ReactionPayload;
use Glhd\Linearavel\Data\RoadmapArchivePayload;
use Glhd\Linearavel\Data\RoadmapPayload;
use Glhd\Linearavel\Data\RoadmapToProjectPayload;
use Glhd\Linearavel\Data\SlackChannelConnectPayload;
use Glhd\Linearavel\Data\TeamArchivePayload;
use Glhd\Linearavel\Data\TeamMembershipPayload;
use Glhd\Linearavel\Data\TeamPayload;
use Glhd\Linearavel\Data\TemplatePayload;
use Glhd\Linearavel\Data\TimeSchedulePayload;
use Glhd\Linearavel\Data\TriageResponsibilityPayload;
use Glhd\Linearavel\Data\UploadPayload;
use Glhd\Linearavel\Data\UserAdminPayload;
use Glhd\Linearavel\Data\UserPayload;
use Glhd\Linearavel\Data\UserSettingsFlagPayload;
use Glhd\Linearavel\Data\UserSettingsFlagsResetPayload;
use Glhd\Linearavel\Data\UserSettingsPayload;
use Glhd\Linearavel\Data\ViewPreferencesPayload;
use Glhd\Linearavel\Data\WebhookPayload;
use Glhd\Linearavel\Data\WorkflowStateArchivePayload;
use Glhd\Linearavel\Data\WorkflowStatePayload;
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
use Glhd\Linearavel\Requests\PendingLinearObjectRequest;

trait MutatesLinear
{
	/**
	 * @param ApiKeyCreateInput $input the api key object to create
	 * @returns PendingLinearObjectRequest<ApiKeyPayload>
	 */
	public function apiKeyCreateMutation(ApiKeyCreateInput $input)
	{
		return $this->linearObjectMutation('apiKeyCreate', ApiKeyPayload::class, compact('input'));
	}
	
	/**
	 * @param string $id the identifier of the API key to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function apiKeyDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('apiKeyDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param AttachmentCreateInput $input the attachment object to create
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	public function attachmentCreateMutation(AttachmentCreateInput $input)
	{
		return $this->linearObjectMutation('attachmentCreate', AttachmentPayload::class, compact('input'));
	}
	
	/**
	 * @param AttachmentUpdateInput $input a partial attachment object to update the attachment with
	 * @param string $id the identifier of the attachment to update
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	public function attachmentUpdateMutation(AttachmentUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('attachmentUpdate', AttachmentPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the attachment to unsync
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	public function attachmentUnsyncSlackMutation(string $id)
	{
		return $this->linearObjectMutation('attachmentUnsyncSlack', AttachmentPayload::class, compact('id'));
	}
	
	/**
	 * @param ?string $createAsUser Create attachment as a user with the provided name. This option is only available to OAuth applications creating attachments in `actor=application` mode.
	 * @param ?string $displayIconUrl Provide an external user avatar URL. Can only be used in conjunction with the `createAsUser` options. This option is only available to OAuth applications creating comments in `actor=application` mode.
	 * @param ?string $title the title to use for the attachment
	 * @param string $url the url to link
	 * @param string $issueId the issue for which to link the url
	 * @param ?string $id the id for the attachment
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	public function attachmentLinkURLMutation(string $url, string $issueId, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $id = null)
	{
		return $this->linearObjectMutation('attachmentLinkURL', AttachmentPayload::class, compact('url', 'issueId', 'createAsUser', 'displayIconUrl', 'title', 'id'));
	}
	
	/**
	 * @param ?string $createAsUser Create attachment as a user with the provided name. This option is only available to OAuth applications creating attachments in `actor=application` mode.
	 * @param ?string $displayIconUrl Provide an external user avatar URL. Can only be used in conjunction with the `createAsUser` options. This option is only available to OAuth applications creating comments in `actor=application` mode.
	 * @param ?string $title the title to use for the attachment
	 * @param string $issueId the issue for which to link the GitLab merge request
	 * @param ?string $id optional attachment ID that may be provided through the API
	 * @param string $url the URL of the GitLab merge request to link
	 * @param string $projectPathWithNamespace The path name to the project including any (sub)groups. E.g. linear/main/client.
	 * @param float $number the GitLab merge request number to link
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	public function attachmentLinkGitLabMRMutation(
		string $issueId,
		string $url,
		string $projectPathWithNamespace,
		float $number,
		?string $createAsUser = null,
		?string $displayIconUrl = null,
		?string $title = null,
		?string $id = null
	) {
		return $this->linearObjectMutation('attachmentLinkGitLabMR', AttachmentPayload::class, compact('issueId', 'url', 'projectPathWithNamespace', 'number', 'createAsUser', 'displayIconUrl', 'title', 'id'));
	}
	
	/**
	 * @param ?string $createAsUser Create attachment as a user with the provided name. This option is only available to OAuth applications creating attachments in `actor=application` mode.
	 * @param ?string $displayIconUrl Provide an external user avatar URL. Can only be used in conjunction with the `createAsUser` options. This option is only available to OAuth applications creating comments in `actor=application` mode.
	 * @param ?string $title the title to use for the attachment
	 * @param string $issueId the Linear issue for which to link the GitHub issue
	 * @param ?string $id optional attachment ID that may be provided through the API
	 * @param string $url the URL of the GitHub issue to link
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	public function attachmentLinkGitHubIssueMutation(string $issueId, string $url, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $id = null)
	{
		return $this->linearObjectMutation('attachmentLinkGitHubIssue', AttachmentPayload::class, compact('issueId', 'url', 'createAsUser', 'displayIconUrl', 'title', 'id'));
	}
	
	/**
	 * @param ?string $createAsUser Create attachment as a user with the provided name. This option is only available to OAuth applications creating attachments in `actor=application` mode.
	 * @param ?string $displayIconUrl Provide an external user avatar URL. Can only be used in conjunction with the `createAsUser` options. This option is only available to OAuth applications creating comments in `actor=application` mode.
	 * @param ?string $title the title to use for the attachment
	 * @param string $issueId the issue for which to link the GitHub pull request
	 * @param ?string $id optional attachment ID that may be provided through the API
	 * @param string $url the URL of the GitHub pull request to link
	 * @param ?string $owner the owner of the GitHub repository
	 * @param ?string $repo the name of the GitHub repository
	 * @param ?float $number the GitHub pull request number to link
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
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
	) {
		return $this->linearObjectMutation('attachmentLinkGitHubPR', AttachmentPayload::class, compact('issueId', 'url', 'createAsUser', 'displayIconUrl', 'title', 'id', 'owner', 'repo', 'number'));
	}
	
	/**
	 * @param ?string $createAsUser Create attachment as a user with the provided name. This option is only available to OAuth applications creating attachments in `actor=application` mode.
	 * @param ?string $displayIconUrl Provide an external user avatar URL. Can only be used in conjunction with the `createAsUser` options. This option is only available to OAuth applications creating comments in `actor=application` mode.
	 * @param ?string $title the title to use for the attachment
	 * @param string $ticketId the Zendesk ticket ID to link
	 * @param string $issueId the issue for which to link the Zendesk ticket
	 * @param ?string $id optional attachment ID that may be provided through the API
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	public function attachmentLinkZendeskMutation(string $ticketId, string $issueId, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $id = null)
	{
		return $this->linearObjectMutation('attachmentLinkZendesk', AttachmentPayload::class, compact('ticketId', 'issueId', 'createAsUser', 'displayIconUrl', 'title', 'id'));
	}
	
	/**
	 * @param ?string $createAsUser Create attachment as a user with the provided name. This option is only available to OAuth applications creating attachments in `actor=application` mode.
	 * @param ?string $displayIconUrl Provide an external user avatar URL. Can only be used in conjunction with the `createAsUser` options. This option is only available to OAuth applications creating comments in `actor=application` mode.
	 * @param ?string $title the title to use for the attachment
	 * @param string $issueId the issue for which to link the Discord message
	 * @param ?string $id optional attachment ID that may be provided through the API
	 * @param string $channelId the Discord channel ID for the message to link
	 * @param string $messageId the Discord message ID for the message to link
	 * @param string $url the Discord message URL for the message to link
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	public function attachmentLinkDiscordMutation(
		string $issueId,
		string $channelId,
		string $messageId,
		string $url,
		?string $createAsUser = null,
		?string $displayIconUrl = null,
		?string $title = null,
		?string $id = null
	) {
		return $this->linearObjectMutation('attachmentLinkDiscord', AttachmentPayload::class, compact('issueId', 'channelId', 'messageId', 'url', 'createAsUser', 'displayIconUrl', 'title', 'id'));
	}
	
	/**
	 * @param ?string $createAsUser Create attachment as a user with the provided name. This option is only available to OAuth applications creating attachments in `actor=application` mode.
	 * @param ?string $displayIconUrl Provide an external user avatar URL. Can only be used in conjunction with the `createAsUser` options. This option is only available to OAuth applications creating comments in `actor=application` mode.
	 * @param ?string $title the title to use for the attachment
	 * @param string $channel the Slack channel ID for the message to link
	 * @param ?string $ts unique identifier of either a thread's parent message or a message in the thread
	 * @param string $latest the latest timestamp for the Slack message
	 * @param string $issueId the issue to which to link the Slack message
	 * @param string $url the Slack message URL for the message to link
	 * @param ?string $id optional attachment ID that may be provided through the API
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
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
	) {
		return $this->linearObjectMutation('attachmentLinkSlack', AttachmentPayload::class, compact('channel', 'latest', 'issueId', 'url', 'createAsUser', 'displayIconUrl', 'title', 'ts', 'id'));
	}
	
	/**
	 * @param ?string $createAsUser Create attachment as a user with the provided name. This option is only available to OAuth applications creating attachments in `actor=application` mode.
	 * @param ?string $displayIconUrl Provide an external user avatar URL. Can only be used in conjunction with the `createAsUser` options. This option is only available to OAuth applications creating comments in `actor=application` mode.
	 * @param ?string $title the title to use for the attachment
	 * @param string $conversationId the Front conversation ID to link
	 * @param string $issueId the issue for which to link the Front conversation
	 * @param ?string $id optional attachment ID that may be provided through the API
	 * @returns PendingLinearObjectRequest<FrontAttachmentPayload>
	 */
	public function attachmentLinkFrontMutation(string $conversationId, string $issueId, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $id = null)
	{
		return $this->linearObjectMutation('attachmentLinkFront', FrontAttachmentPayload::class, compact('conversationId', 'issueId', 'createAsUser', 'displayIconUrl', 'title', 'id'));
	}
	
	/**
	 * @param ?string $createAsUser Create attachment as a user with the provided name. This option is only available to OAuth applications creating attachments in `actor=application` mode.
	 * @param ?string $displayIconUrl Provide an external user avatar URL. Can only be used in conjunction with the `createAsUser` options. This option is only available to OAuth applications creating comments in `actor=application` mode.
	 * @param ?string $title the title to use for the attachment
	 * @param string $conversationId the Intercom conversation ID to link
	 * @param ?string $id optional attachment ID that may be provided through the API
	 * @param string $issueId the issue for which to link the Intercom conversation
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	public function attachmentLinkIntercomMutation(string $conversationId, string $issueId, ?string $createAsUser = null, ?string $displayIconUrl = null, ?string $title = null, ?string $id = null)
	{
		return $this->linearObjectMutation('attachmentLinkIntercom', AttachmentPayload::class, compact('conversationId', 'issueId', 'createAsUser', 'displayIconUrl', 'title', 'id'));
	}
	
	/**
	 * @param string $issueId the issue for which to link the Jira issue
	 * @param string $jiraIssueId the Jira issue key or ID to link
	 * @returns PendingLinearObjectRequest<AttachmentPayload>
	 */
	public function attachmentLinkJiraIssueMutation(string $issueId, string $jiraIssueId)
	{
		return $this->linearObjectMutation('attachmentLinkJiraIssue', AttachmentPayload::class, compact('issueId', 'jiraIssueId'));
	}
	
	/**
	 * @param string $id the identifier of the attachment to archive
	 * @returns PendingLinearObjectRequest<AttachmentArchivePayload>
	 */
	public function attachmentArchiveMutation(string $id)
	{
		return $this->linearObjectMutation('attachmentArchive', AttachmentArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the attachment to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function attachmentDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('attachmentDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param EmailUserAccountAuthChallengeInput $input the data used for email authentication
	 * @returns PendingLinearObjectRequest<EmailUserAccountAuthChallengeResponse>
	 */
	public function emailUserAccountAuthChallengeMutation(EmailUserAccountAuthChallengeInput $input)
	{
		return $this->linearObjectMutation('emailUserAccountAuthChallenge', EmailUserAccountAuthChallengeResponse::class, compact('input'));
	}
	
	/**
	 * @param TokenUserAccountAuthInput $input the data used for token authentication
	 * @returns PendingLinearObjectRequest<AuthResolverResponse>
	 */
	public function emailTokenUserAccountAuthMutation(TokenUserAccountAuthInput $input)
	{
		return $this->linearObjectMutation('emailTokenUserAccountAuth', AuthResolverResponse::class, compact('input'));
	}
	
	/**
	 * @param TokenUserAccountAuthInput $input the data used for token authentication
	 * @returns PendingLinearObjectRequest<AuthResolverResponse>
	 */
	public function samlTokenUserAccountAuthMutation(TokenUserAccountAuthInput $input)
	{
		return $this->linearObjectMutation('samlTokenUserAccountAuth', AuthResolverResponse::class, compact('input'));
	}
	
	/**
	 * @param GoogleUserAccountAuthInput $input the data used for Google authentication
	 * @returns PendingLinearObjectRequest<AuthResolverResponse>
	 */
	public function googleUserAccountAuthMutation(GoogleUserAccountAuthInput $input)
	{
		return $this->linearObjectMutation('googleUserAccountAuth', AuthResolverResponse::class, compact('input'));
	}
	
	/**
	 * @param ?OnboardingCustomerSurvey $survey onboarding survey
	 * @param CreateOrganizationInput $input organization details for the new organization
	 * @returns PendingLinearObjectRequest<CreateOrJoinOrganizationResponse>
	 */
	public function createOrganizationFromOnboardingMutation(CreateOrganizationInput $input, ?OnboardingCustomerSurvey $survey = null)
	{
		return $this->linearObjectMutation('createOrganizationFromOnboarding', CreateOrJoinOrganizationResponse::class, compact('input', 'survey'));
	}
	
	/**
	 * @param JoinOrganizationInput $input organization details for the organization to join
	 * @returns PendingLinearObjectRequest<CreateOrJoinOrganizationResponse>
	 */
	public function joinOrganizationFromOnboardingMutation(JoinOrganizationInput $input)
	{
		return $this->linearObjectMutation('joinOrganizationFromOnboarding', CreateOrJoinOrganizationResponse::class, compact('input'));
	}
	
	/**
	 * @param string $organizationId ID of the organization to leave
	 * @returns PendingLinearObjectRequest<CreateOrJoinOrganizationResponse>
	 */
	public function leaveOrganizationMutation(string $organizationId)
	{
		return $this->linearObjectMutation('leaveOrganization', CreateOrJoinOrganizationResponse::class, compact('organizationId'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<LogoutResponse>
	 */
	public function logoutMutation()
	{
		return $this->linearObjectMutation('logout', LogoutResponse::class);
	}
	
	/**
	 * @param string $sessionId ID of the session to logout
	 * @returns PendingLinearObjectRequest<LogoutResponse>
	 */
	public function logoutSessionMutation(string $sessionId)
	{
		return $this->linearObjectMutation('logoutSession', LogoutResponse::class, compact('sessionId'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<LogoutResponse>
	 */
	public function logoutAllSessionsMutation()
	{
		return $this->linearObjectMutation('logoutAllSessions', LogoutResponse::class);
	}
	
	/**
	 * @returns PendingLinearObjectRequest<LogoutResponse>
	 */
	public function logoutOtherSessionsMutation()
	{
		return $this->linearObjectMutation('logoutOtherSessions', LogoutResponse::class);
	}
	
	/**
	 * @param CommentCreateInput $input the comment object to create
	 * @returns PendingLinearObjectRequest<CommentPayload>
	 */
	public function commentCreateMutation(CommentCreateInput $input)
	{
		return $this->linearObjectMutation('commentCreate', CommentPayload::class, compact('input'));
	}
	
	/**
	 * @param CommentUpdateInput $input a partial comment object to update the comment with
	 * @param string $id the identifier of the comment to update
	 * @returns PendingLinearObjectRequest<CommentPayload>
	 */
	public function commentUpdateMutation(CommentUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('commentUpdate', CommentPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the comment to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function commentDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('commentDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param ?string $resolvingCommentId
	 * @param string $id the identifier of the comment to update
	 * @returns PendingLinearObjectRequest<CommentPayload>
	 */
	public function commentResolveMutation(string $id, ?string $resolvingCommentId = null)
	{
		return $this->linearObjectMutation('commentResolve', CommentPayload::class, compact('id', 'resolvingCommentId'));
	}
	
	/**
	 * @param string $id the identifier of the comment to update
	 * @returns PendingLinearObjectRequest<CommentPayload>
	 */
	public function commentUnresolveMutation(string $id)
	{
		return $this->linearObjectMutation('commentUnresolve', CommentPayload::class, compact('id'));
	}
	
	/**
	 * @param ContactCreateInput $input the contact entry to create
	 * @returns PendingLinearObjectRequest<ContactPayload>
	 */
	public function contactCreateMutation(ContactCreateInput $input)
	{
		return $this->linearObjectMutation('contactCreate', ContactPayload::class, compact('input'));
	}
	
	/**
	 * @param ContactSalesCreateInput $input the contact entry to create
	 * @returns PendingLinearObjectRequest<ContactPayload>
	 */
	public function contactSalesCreateMutation(ContactSalesCreateInput $input)
	{
		return $this->linearObjectMutation('contactSalesCreate', ContactPayload::class, compact('input'));
	}
	
	/**
	 * @param CustomViewCreateInput $input the properties of the custom view to create
	 * @returns PendingLinearObjectRequest<CustomViewPayload>
	 */
	public function customViewCreateMutation(CustomViewCreateInput $input)
	{
		return $this->linearObjectMutation('customViewCreate', CustomViewPayload::class, compact('input'));
	}
	
	/**
	 * @param CustomViewUpdateInput $input the properties of the custom view to update
	 * @param string $id the identifier of the custom view to update
	 * @returns PendingLinearObjectRequest<CustomViewPayload>
	 */
	public function customViewUpdateMutation(CustomViewUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('customViewUpdate', CustomViewPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the custom view to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function customViewDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('customViewDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param CycleCreateInput $input the cycle object to create
	 * @returns PendingLinearObjectRequest<CyclePayload>
	 */
	public function cycleCreateMutation(CycleCreateInput $input)
	{
		return $this->linearObjectMutation('cycleCreate', CyclePayload::class, compact('input'));
	}
	
	/**
	 * @param CycleUpdateInput $input a partial cycle object to update the cycle with
	 * @param string $id the identifier of the cycle to update
	 * @returns PendingLinearObjectRequest<CyclePayload>
	 */
	public function cycleUpdateMutation(CycleUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('cycleUpdate', CyclePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the cycle to archive
	 * @returns PendingLinearObjectRequest<CycleArchivePayload>
	 */
	public function cycleArchiveMutation(string $id)
	{
		return $this->linearObjectMutation('cycleArchive', CycleArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param CycleShiftAllInput $input a partial cycle object to update the cycle with
	 * @returns PendingLinearObjectRequest<CyclePayload>
	 */
	public function cycleShiftAllMutation(CycleShiftAllInput $input)
	{
		return $this->linearObjectMutation('cycleShiftAll', CyclePayload::class, compact('input'));
	}
	
	/**
	 * @param DocumentCreateInput $input the document to create
	 * @returns PendingLinearObjectRequest<DocumentPayload>
	 */
	public function documentCreateMutation(DocumentCreateInput $input)
	{
		return $this->linearObjectMutation('documentCreate', DocumentPayload::class, compact('input'));
	}
	
	/**
	 * @param DocumentUpdateInput $input a partial document object to update the document with
	 * @param string $id The identifier of the document to update. Also the identifier from the URL is accepted.
	 * @returns PendingLinearObjectRequest<DocumentPayload>
	 */
	public function documentUpdateMutation(DocumentUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('documentUpdate', DocumentPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the document to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function documentDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('documentDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param EmailIntakeAddressCreateInput $input the email intake address object to create
	 * @returns PendingLinearObjectRequest<EmailIntakeAddressPayload>
	 */
	public function emailIntakeAddressCreateMutation(EmailIntakeAddressCreateInput $input)
	{
		return $this->linearObjectMutation('emailIntakeAddressCreate', EmailIntakeAddressPayload::class, compact('input'));
	}
	
	/**
	 * @param string $id the identifier of the email intake address
	 * @returns PendingLinearObjectRequest<EmailIntakeAddressPayload>
	 */
	public function emailIntakeAddressRotateMutation(string $id)
	{
		return $this->linearObjectMutation('emailIntakeAddressRotate', EmailIntakeAddressPayload::class, compact('id'));
	}
	
	/**
	 * @param EmailIntakeAddressUpdateInput $input the properties of the email intake address to update
	 * @param string $id the identifier of the email intake address
	 * @returns PendingLinearObjectRequest<EmailIntakeAddressPayload>
	 */
	public function emailIntakeAddressUpdateMutation(EmailIntakeAddressUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('emailIntakeAddressUpdate', EmailIntakeAddressPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the email intake address to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function emailIntakeAddressDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('emailIntakeAddressDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param EmailUnsubscribeInput $input unsubscription details
	 * @returns PendingLinearObjectRequest<EmailUnsubscribePayload>
	 */
	public function emailUnsubscribeMutation(EmailUnsubscribeInput $input)
	{
		return $this->linearObjectMutation('emailUnsubscribe', EmailUnsubscribePayload::class, compact('input'));
	}
	
	/**
	 * @param EmojiCreateInput $input the emoji object to create
	 * @returns PendingLinearObjectRequest<EmojiPayload>
	 */
	public function emojiCreateMutation(EmojiCreateInput $input)
	{
		return $this->linearObjectMutation('emojiCreate', EmojiPayload::class, compact('input'));
	}
	
	/**
	 * @param string $id the identifier of the emoji to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function emojiDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('emojiDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param InitiativeToProjectCreateInput $input the properties of the initiativeToProject to create
	 * @returns PendingLinearObjectRequest<InitiativeToProjectPayload>
	 */
	public function initiativeToProjectCreateMutation(InitiativeToProjectCreateInput $input)
	{
		return $this->linearObjectMutation('initiativeToProjectCreate', InitiativeToProjectPayload::class, compact('input'));
	}
	
	/**
	 * @param InitiativeToProjectUpdateInput $input the properties of the initiativeToProject to update
	 * @param string $id the identifier of the initiativeToProject to update
	 * @returns PendingLinearObjectRequest<InitiativeToProjectPayload>
	 */
	public function initiativeToProjectUpdateMutation(InitiativeToProjectUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('initiativeToProjectUpdate', InitiativeToProjectPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the initiativeToProject to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function initiativeToProjectDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('initiativeToProjectDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param InitiativeCreateInput $input the properties of the initiative to create
	 * @returns PendingLinearObjectRequest<InitiativePayload>
	 */
	public function initiativeCreateMutation(InitiativeCreateInput $input)
	{
		return $this->linearObjectMutation('initiativeCreate', InitiativePayload::class, compact('input'));
	}
	
	/**
	 * @param InitiativeUpdateInput $input the properties of the initiative to update
	 * @param string $id the identifier of the initiative to update
	 * @returns PendingLinearObjectRequest<InitiativePayload>
	 */
	public function initiativeUpdateMutation(InitiativeUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('initiativeUpdate', InitiativePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the initiative to archive
	 * @returns PendingLinearObjectRequest<InitiativeArchivePayload>
	 */
	public function initiativeArchiveMutation(string $id)
	{
		return $this->linearObjectMutation('initiativeArchive', InitiativeArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the initiative to unarchive
	 * @returns PendingLinearObjectRequest<InitiativeArchivePayload>
	 */
	public function initiativeUnarchiveMutation(string $id)
	{
		return $this->linearObjectMutation('initiativeUnarchive', InitiativeArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the initiative to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function initiativeDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('initiativeDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param FavoriteCreateInput $input the favorite object to create
	 * @returns PendingLinearObjectRequest<FavoritePayload>
	 */
	public function favoriteCreateMutation(FavoriteCreateInput $input)
	{
		return $this->linearObjectMutation('favoriteCreate', FavoritePayload::class, compact('input'));
	}
	
	/**
	 * @param FavoriteUpdateInput $input a partial favorite object to update the favorite with
	 * @param string $id the identifier of the favorite to update
	 * @returns PendingLinearObjectRequest<FavoritePayload>
	 */
	public function favoriteUpdateMutation(FavoriteUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('favoriteUpdate', FavoritePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the favorite reference to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function favoriteDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('favoriteDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param ?string $metaData optional metadata
	 * @param ?bool $makePublic should the file be made publicly accessible (default: false)
	 * @param int $size file size of the uploaded file
	 * @param string $contentType MIME type of the uploaded file
	 * @param string $filename filename of the uploaded file
	 * @returns PendingLinearObjectRequest<UploadPayload>
	 */
	public function fileUploadMutation(int $size, string $contentType, string $filename, ?string $metaData = null, ?bool $makePublic = null)
	{
		return $this->linearObjectMutation('fileUpload', UploadPayload::class, compact('size', 'contentType', 'filename', 'metaData', 'makePublic'));
	}
	
	/**
	 * @param ?string $metaData optional metadata
	 * @param int $size file size of the uploaded file
	 * @param string $contentType MIME type of the uploaded file
	 * @param string $filename filename of the uploaded file
	 * @returns PendingLinearObjectRequest<UploadPayload>
	 */
	public function importFileUploadMutation(int $size, string $contentType, string $filename, ?string $metaData = null)
	{
		return $this->linearObjectMutation('importFileUpload', UploadPayload::class, compact('size', 'contentType', 'filename', 'metaData'));
	}
	
	/**
	 * @param string $url URL of the file to be uploaded to Linear
	 * @returns PendingLinearObjectRequest<ImageUploadFromUrlPayload>
	 */
	public function imageUploadFromUrlMutation(string $url)
	{
		return $this->linearObjectMutation('imageUploadFromUrl', ImageUploadFromUrlPayload::class, compact('url'));
	}
	
	/**
	 * @param GitAutomationStateCreateInput $input the automation state to create
	 * @returns PendingLinearObjectRequest<GitAutomationStatePayload>
	 */
	public function gitAutomationStateCreateMutation(GitAutomationStateCreateInput $input)
	{
		return $this->linearObjectMutation('gitAutomationStateCreate', GitAutomationStatePayload::class, compact('input'));
	}
	
	/**
	 * @param GitAutomationStateUpdateInput $input the state to update
	 * @param string $id the identifier of the state to update
	 * @returns PendingLinearObjectRequest<GitAutomationStatePayload>
	 */
	public function gitAutomationStateUpdateMutation(GitAutomationStateUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('gitAutomationStateUpdate', GitAutomationStatePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the automation state to archive
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function gitAutomationStateDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('gitAutomationStateDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param GitAutomationTargetBranchCreateInput $input the Git target branch automation to create
	 * @returns PendingLinearObjectRequest<GitAutomationTargetBranchPayload>
	 */
	public function gitAutomationTargetBranchCreateMutation(GitAutomationTargetBranchCreateInput $input)
	{
		return $this->linearObjectMutation('gitAutomationTargetBranchCreate', GitAutomationTargetBranchPayload::class, compact('input'));
	}
	
	/**
	 * @param GitAutomationTargetBranchUpdateInput $input the updates
	 * @param string $id the identifier of the Git target branch automation to update
	 * @returns PendingLinearObjectRequest<GitAutomationTargetBranchPayload>
	 */
	public function gitAutomationTargetBranchUpdateMutation(GitAutomationTargetBranchUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('gitAutomationTargetBranchUpdate', GitAutomationTargetBranchPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the Git target branch automation to archive
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function gitAutomationTargetBranchDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('gitAutomationTargetBranchDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param IntegrationRequestInput $input integration request details
	 * @returns PendingLinearObjectRequest<IntegrationRequestPayload>
	 */
	public function integrationRequestMutation(IntegrationRequestInput $input)
	{
		return $this->linearObjectMutation('integrationRequest', IntegrationRequestPayload::class, compact('input'));
	}
	
	/**
	 * @param IntegrationSettingsInput $input an integration settings object
	 * @param string $id the identifier of the integration to update
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationSettingsUpdateMutation(IntegrationSettingsInput $input, string $id)
	{
		return $this->linearObjectMutation('integrationSettingsUpdate', IntegrationPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<GitHubCommitIntegrationPayload>
	 */
	public function integrationGithubCommitCreateMutation()
	{
		return $this->linearObjectMutation('integrationGithubCommitCreate', GitHubCommitIntegrationPayload::class);
	}
	
	/**
	 * @param string $installationId the GitHub data to connect with
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationGithubConnectMutation(string $installationId)
	{
		return $this->linearObjectMutation('integrationGithubConnect', IntegrationPayload::class, compact('installationId'));
	}
	
	/**
	 * @param string $gitlabUrl the URL of the GitLab installation
	 * @param string $accessToken the GitLab Access Token to connect with
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationGitlabConnectMutation(string $gitlabUrl, string $accessToken)
	{
		return $this->linearObjectMutation('integrationGitlabConnect', IntegrationPayload::class, compact('gitlabUrl', 'accessToken'));
	}
	
	/**
	 * @param AirbyteConfigurationInput $input airbyte integration settings
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function airbyteIntegrationConnectMutation(AirbyteConfigurationInput $input)
	{
		return $this->linearObjectMutation('airbyteIntegrationConnect', IntegrationPayload::class, compact('input'));
	}
	
	/**
	 * @param string $code [Internal] The Google OAuth code
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationGoogleCalendarPersonalConnectMutation(string $code)
	{
		return $this->linearObjectMutation('integrationGoogleCalendarPersonalConnect', IntegrationPayload::class, compact('code'));
	}
	
	/**
	 * @param JiraConfigurationInput $input jira integration settings
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function jiraIntegrationConnectMutation(JiraConfigurationInput $input)
	{
		return $this->linearObjectMutation('jiraIntegrationConnect', IntegrationPayload::class, compact('input'));
	}
	
	/**
	 * @param JiraUpdateInput $input jira integration update input
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationJiraUpdateMutation(JiraUpdateInput $input)
	{
		return $this->linearObjectMutation('integrationJiraUpdate', IntegrationPayload::class, compact('input'));
	}
	
	/**
	 * @param ?string $code the Jira OAuth code, when connecting using OAuth
	 * @param ?string $accessToken the Jira personal access token, when connecting using a PAT
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationJiraPersonalMutation(?string $code = null, ?string $accessToken = null)
	{
		return $this->linearObjectMutation('integrationJiraPersonal', IntegrationPayload::class, compact('code', 'accessToken'));
	}
	
	/**
	 * @param string $code the GitHub OAuth code
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationGitHubPersonalMutation(string $code)
	{
		return $this->linearObjectMutation('integrationGitHubPersonal', IntegrationPayload::class, compact('code'));
	}
	
	/**
	 * @param ?string $domainUrl The Intercom domain URL to use for the integration. Defaults to app.intercom.com if not provided.
	 * @param string $redirectUri the Intercom OAuth redirect URI
	 * @param string $code the Intercom OAuth code
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationIntercomMutation(string $redirectUri, string $code, ?string $domainUrl = null)
	{
		return $this->linearObjectMutation('integrationIntercom', IntegrationPayload::class, compact('redirectUri', 'code', 'domainUrl'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationIntercomDeleteMutation()
	{
		return $this->linearObjectMutation('integrationIntercomDelete', IntegrationPayload::class);
	}
	
	/**
	 * @param IntercomSettingsInput $input a partial Intercom integration settings object to update the integration settings with
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationIntercomSettingsUpdateMutation(IntercomSettingsInput $input)
	{
		return $this->linearObjectMutation('integrationIntercomSettingsUpdate', IntegrationPayload::class, compact('input'));
	}
	
	/**
	 * @param string $redirectUri the Discord OAuth redirect URI
	 * @param string $code the Discord OAuth code
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationDiscordMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('integrationDiscord', IntegrationPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param string $apiKey the Opsgenie API key
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationOpsgenieConnectMutation(string $apiKey)
	{
		return $this->linearObjectMutation('integrationOpsgenieConnect', IntegrationPayload::class, compact('apiKey'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationOpsgenieRefreshScheduleMappingsMutation()
	{
		return $this->linearObjectMutation('integrationOpsgenieRefreshScheduleMappings', IntegrationPayload::class);
	}
	
	/**
	 * @param string $code the PagerDuty OAuth code
	 * @param string $redirectUri the PagerDuty OAuth redirect URI
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationPagerDutyConnectMutation(string $code, string $redirectUri)
	{
		return $this->linearObjectMutation('integrationPagerDutyConnect', IntegrationPayload::class, compact('code', 'redirectUri'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationPagerDutyRefreshScheduleMappingsMutation()
	{
		return $this->linearObjectMutation('integrationPagerDutyRefreshScheduleMappings', IntegrationPayload::class);
	}
	
	/**
	 * @param string $redirectUri the Slack OAuth redirect URI
	 * @param string $code the Slack OAuth code
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationUpdateSlackMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('integrationUpdateSlack', IntegrationPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param ?bool $shouldUseV2Auth [DEPRECATED] Whether or not v2 of Slack OAuth should be used. No longer used.
	 * @param string $redirectUri the Slack OAuth redirect URI
	 * @param string $code the Slack OAuth code
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationSlackMutation(string $redirectUri, string $code, ?bool $shouldUseV2Auth = null)
	{
		return $this->linearObjectMutation('integrationSlack', IntegrationPayload::class, compact('redirectUri', 'code', 'shouldUseV2Auth'));
	}
	
	/**
	 * @param string $redirectUri the Slack OAuth redirect URI
	 * @param string $code the Slack OAuth code
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationSlackAsksMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('integrationSlackAsks', IntegrationPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param string $redirectUri the Slack OAuth redirect URI
	 * @param string $code the Slack OAuth code
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationSlackPersonalMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('integrationSlackPersonal', IntegrationPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param string $redirectUri the Slack OAuth redirect URI
	 * @param string $code the Slack OAuth code
	 * @returns PendingLinearObjectRequest<AsksChannelConnectPayload>
	 */
	public function integrationAsksConnectChannelMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('integrationAsksConnectChannel', AsksChannelConnectPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param ?bool $shouldUseV2Auth [DEPRECATED] Whether or not v2 of Slack OAuth should be used. No longer used.
	 * @param string $redirectUri the Slack OAuth redirect URI
	 * @param string $teamId integration's associated team
	 * @param string $code the Slack OAuth code
	 * @returns PendingLinearObjectRequest<SlackChannelConnectPayload>
	 */
	public function integrationSlackPostMutation(string $redirectUri, string $teamId, string $code, ?bool $shouldUseV2Auth = null)
	{
		return $this->linearObjectMutation('integrationSlackPost', SlackChannelConnectPayload::class, compact('redirectUri', 'teamId', 'code', 'shouldUseV2Auth'));
	}
	
	/**
	 * @param string $service the service to enable once connected, either 'notifications' or 'updates'
	 * @param string $redirectUri the Slack OAuth redirect URI
	 * @param string $projectId integration's associated project
	 * @param string $code the Slack OAuth code
	 * @returns PendingLinearObjectRequest<SlackChannelConnectPayload>
	 */
	public function integrationSlackProjectPostMutation(string $service, string $redirectUri, string $projectId, string $code)
	{
		return $this->linearObjectMutation('integrationSlackProjectPost', SlackChannelConnectPayload::class, compact('service', 'redirectUri', 'projectId', 'code'));
	}
	
	/**
	 * @param string $redirectUri the Slack OAuth redirect URI
	 * @param string $code the Slack OAuth code
	 * @returns PendingLinearObjectRequest<SlackChannelConnectPayload>
	 */
	public function integrationSlackOrgProjectUpdatesPostMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('integrationSlackOrgProjectUpdatesPost', SlackChannelConnectPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param string $redirectUri the Slack OAuth redirect URI
	 * @param string $code the Slack OAuth code
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationSlackImportEmojisMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('integrationSlackImportEmojis', IntegrationPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param string $redirectUri the Figma OAuth redirect URI
	 * @param string $code the Figma OAuth code
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationFigmaMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('integrationFigma', IntegrationPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param string $code the Google OAuth code
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationGoogleSheetsMutation(string $code)
	{
		return $this->linearObjectMutation('integrationGoogleSheets', IntegrationPayload::class, compact('code'));
	}
	
	/**
	 * @param string $id the identifier of the Google Sheets integration to update
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function refreshGoogleSheetsDataMutation(string $id)
	{
		return $this->linearObjectMutation('refreshGoogleSheetsData', IntegrationPayload::class, compact('id'));
	}
	
	/**
	 * @param string $organizationSlug the slug of the Sentry organization being connected
	 * @param string $code the Sentry grant code that's exchanged for OAuth tokens
	 * @param string $installationId the Sentry installationId to connect with
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationSentryConnectMutation(string $organizationSlug, string $code, string $installationId)
	{
		return $this->linearObjectMutation('integrationSentryConnect', IntegrationPayload::class, compact('organizationSlug', 'code', 'installationId'));
	}
	
	/**
	 * @param string $redirectUri the Front OAuth redirect URI
	 * @param string $code the Front OAuth code
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationFrontMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('integrationFront', IntegrationPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param string $subdomain the Zendesk installation subdomain
	 * @param string $code the Zendesk OAuth code
	 * @param string $scope the Zendesk OAuth scopes
	 * @param string $redirectUri the Zendesk OAuth redirect URI
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationZendeskMutation(string $subdomain, string $code, string $scope, string $redirectUri)
	{
		return $this->linearObjectMutation('integrationZendesk', IntegrationPayload::class, compact('subdomain', 'code', 'scope', 'redirectUri'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<IntegrationPayload>
	 */
	public function integrationLoomMutation()
	{
		return $this->linearObjectMutation('integrationLoom', IntegrationPayload::class);
	}
	
	/**
	 * @param string $id the identifier of the integration to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function integrationDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('integrationDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the integration to archive
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function integrationArchiveMutation(string $id)
	{
		return $this->linearObjectMutation('integrationArchive', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param IntegrationsSettingsCreateInput $input the settings to create
	 * @returns PendingLinearObjectRequest<IntegrationsSettingsPayload>
	 */
	public function integrationsSettingsCreateMutation(IntegrationsSettingsCreateInput $input)
	{
		return $this->linearObjectMutation('integrationsSettingsCreate', IntegrationsSettingsPayload::class, compact('input'));
	}
	
	/**
	 * @param IntegrationsSettingsUpdateInput $input a settings object to update the settings with
	 * @param string $id the identifier of the settings to update
	 * @returns PendingLinearObjectRequest<IntegrationsSettingsPayload>
	 */
	public function integrationsSettingsUpdateMutation(IntegrationsSettingsUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('integrationsSettingsUpdate', IntegrationsSettingsPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param IntegrationTemplateCreateInput $input the properties of the integrationTemplate to create
	 * @returns PendingLinearObjectRequest<IntegrationTemplatePayload>
	 */
	public function integrationTemplateCreateMutation(IntegrationTemplateCreateInput $input)
	{
		return $this->linearObjectMutation('integrationTemplateCreate', IntegrationTemplatePayload::class, compact('input'));
	}
	
	/**
	 * @param string $id the identifier of the integrationTemplate to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function integrationTemplateDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('integrationTemplateDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param ?string $organizationId ID of the organization into which to import data
	 * @param ?string $teamId ID of the team into which to import data
	 * @param ?string $teamName Name of new team. When teamId is not set.
	 * @param string $githubToken gitHub token to fetch information from the GitHub API
	 * @param string $githubRepoName gitHub repository name from which we will import data
	 * @param string $githubRepoOwner gitHub owner (user or org) for the repository from which we will import data
	 * @param ?bool $githubShouldImportOrgProjects whether or not we should import GitHub organization level projects
	 * @param ?bool $instantProcess whether to instantly process the import with the default configuration mapping
	 * @param ?bool $includeClosedIssues whether or not we should collect the data for closed issues
	 * @param ?string $id ID of issue import. If not provided it will be generated.
	 * @returns PendingLinearObjectRequest<IssueImportPayload>
	 */
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
	) {
		return $this->linearObjectMutation('issueImportCreateGithub', IssueImportPayload::class, compact('githubToken', 'githubRepoName', 'githubRepoOwner', 'organizationId', 'teamId', 'teamName', 'githubShouldImportOrgProjects', 'instantProcess', 'includeClosedIssues', 'id'));
	}
	
	/**
	 * @param ?string $organizationId ID of the organization into which to import data
	 * @param ?string $teamId ID of the team into which to import data. Empty to create new team.
	 * @param ?string $teamName Name of new team. When teamId is not set.
	 * @param string $jiraToken jira personal access token to access Jira REST API
	 * @param string $jiraProject jira project key from which we will import data
	 * @param string $jiraEmail jira user account email
	 * @param string $jiraHostname jira installation or cloud hostname
	 * @param ?bool $instantProcess whether to instantly process the import with the default configuration mapping
	 * @param ?bool $includeClosedIssues whether or not we should collect the data for closed issues
	 * @param ?string $id ID of issue import. If not provided it will be generated.
	 * @returns PendingLinearObjectRequest<IssueImportPayload>
	 */
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
	) {
		return $this->linearObjectMutation('issueImportCreateJira', IssueImportPayload::class, compact('jiraToken', 'jiraProject', 'jiraEmail', 'jiraHostname', 'organizationId', 'teamId', 'teamName', 'instantProcess', 'includeClosedIssues', 'id'));
	}
	
	/**
	 * @param ?string $organizationId ID of the organization into which to import data
	 * @param ?string $teamId ID of the team into which to import data. Empty to create new team.
	 * @param ?string $teamName Name of new team. When teamId is not set.
	 * @param string $csvUrl URL for the CSV
	 * @param ?string $jiraHostname jira installation or cloud hostname
	 * @param ?string $jiraToken jira personal access token to access Jira REST API
	 * @param ?string $jiraEmail jira user account email
	 * @returns PendingLinearObjectRequest<IssueImportPayload>
	 */
	public function issueImportCreateCSVJiraMutation(
		string $csvUrl,
		?string $organizationId = null,
		?string $teamId = null,
		?string $teamName = null,
		?string $jiraHostname = null,
		?string $jiraToken = null,
		?string $jiraEmail = null
	) {
		return $this->linearObjectMutation('issueImportCreateCSVJira', IssueImportPayload::class, compact('csvUrl', 'organizationId', 'teamId', 'teamName', 'jiraHostname', 'jiraToken', 'jiraEmail'));
	}
	
	/**
	 * @param ?string $organizationId ID of the organization into which to import data
	 * @param ?string $teamId ID of the team into which to import data
	 * @param ?string $teamName Name of new team. When teamId is not set.
	 * @param string $clubhouseToken shortcut (formerly Clubhouse) token to fetch information from the Clubhouse API
	 * @param string $clubhouseGroupName shortcut (formerly Clubhouse) group name to choose which issues we should import
	 * @param ?bool $instantProcess whether to instantly process the import with the default configuration mapping
	 * @param ?bool $includeClosedIssues whether or not we should collect the data for closed issues
	 * @param ?string $id ID of issue import. If not provided it will be generated.
	 * @returns PendingLinearObjectRequest<IssueImportPayload>
	 */
	public function issueImportCreateClubhouseMutation(
		string $clubhouseToken,
		string $clubhouseGroupName,
		?string $organizationId = null,
		?string $teamId = null,
		?string $teamName = null,
		?bool $instantProcess = null,
		?bool $includeClosedIssues = null,
		?string $id = null
	) {
		return $this->linearObjectMutation('issueImportCreateClubhouse', IssueImportPayload::class, compact('clubhouseToken', 'clubhouseGroupName', 'organizationId', 'teamId', 'teamName', 'instantProcess', 'includeClosedIssues', 'id'));
	}
	
	/**
	 * @param ?string $organizationId ID of the organization into which to import data
	 * @param ?string $teamId ID of the team into which to import data
	 * @param ?string $teamName Name of new team. When teamId is not set.
	 * @param string $asanaToken asana token to fetch information from the Asana API
	 * @param string $asanaTeamName asana team name to choose which issues we should import
	 * @param ?bool $instantProcess whether to instantly process the import with the default configuration mapping
	 * @param ?bool $includeClosedIssues whether or not we should collect the data for closed issues
	 * @param ?string $id ID of issue import. If not provided it will be generated.
	 * @returns PendingLinearObjectRequest<IssueImportPayload>
	 */
	public function issueImportCreateAsanaMutation(
		string $asanaToken,
		string $asanaTeamName,
		?string $organizationId = null,
		?string $teamId = null,
		?string $teamName = null,
		?bool $instantProcess = null,
		?bool $includeClosedIssues = null,
		?string $id = null
	) {
		return $this->linearObjectMutation('issueImportCreateAsana', IssueImportPayload::class, compact('asanaToken', 'asanaTeamName', 'organizationId', 'teamId', 'teamName', 'instantProcess', 'includeClosedIssues', 'id'));
	}
	
	/**
	 * @param string $issueImportId ID of the issue import to delete
	 * @returns PendingLinearObjectRequest<IssueImportDeletePayload>
	 */
	public function issueImportDeleteMutation(string $issueImportId)
	{
		return $this->linearObjectMutation('issueImportDelete', IssueImportDeletePayload::class, compact('issueImportId'));
	}
	
	/**
	 * @param string $mapping the mapping configuration to use for processing the import
	 * @param string $issueImportId ID of the issue import which we're going to process
	 * @returns PendingLinearObjectRequest<IssueImportPayload>
	 */
	public function issueImportProcessMutation(string $mapping, string $issueImportId)
	{
		return $this->linearObjectMutation('issueImportProcess', IssueImportPayload::class, compact('mapping', 'issueImportId'));
	}
	
	/**
	 * @param IssueImportUpdateInput $input the properties of the issue import to update
	 * @param string $id the identifier of the issue import
	 * @returns PendingLinearObjectRequest<IssueImportPayload>
	 */
	public function issueImportUpdateMutation(IssueImportUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('issueImportUpdate', IssueImportPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param ?bool $replaceTeamLabels whether to replace all team-specific labels with the same name with this newly created workspace label
	 * @param IssueLabelCreateInput $input the issue label to create
	 * @returns PendingLinearObjectRequest<IssueLabelPayload>
	 */
	public function issueLabelCreateMutation(IssueLabelCreateInput $input, ?bool $replaceTeamLabels = null)
	{
		return $this->linearObjectMutation('issueLabelCreate', IssueLabelPayload::class, compact('input', 'replaceTeamLabels'));
	}
	
	/**
	 * @param IssueLabelUpdateInput $input a partial label object to update
	 * @param string $id the identifier of the label to update
	 * @returns PendingLinearObjectRequest<IssueLabelPayload>
	 */
	public function issueLabelUpdateMutation(IssueLabelUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('issueLabelUpdate', IssueLabelPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the label to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function issueLabelDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('issueLabelDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param IssueRelationCreateInput $input the issue relation to create
	 * @returns PendingLinearObjectRequest<IssueRelationPayload>
	 */
	public function issueRelationCreateMutation(IssueRelationCreateInput $input)
	{
		return $this->linearObjectMutation('issueRelationCreate', IssueRelationPayload::class, compact('input'));
	}
	
	/**
	 * @param IssueRelationUpdateInput $input the properties of the issue relation to update
	 * @param string $id the identifier of the issue relation to update
	 * @returns PendingLinearObjectRequest<IssueRelationPayload>
	 */
	public function issueRelationUpdateMutation(IssueRelationUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('issueRelationUpdate', IssueRelationPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the issue relation to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function issueRelationDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('issueRelationDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param IssueCreateInput $input the issue object to create
	 * @returns PendingLinearObjectRequest<IssuePayload>
	 */
	public function issueCreateMutation(IssueCreateInput $input)
	{
		return $this->linearObjectMutation('issueCreate', IssuePayload::class, compact('input'));
	}
	
	/**
	 * @param IssueUpdateInput $input a partial issue object to update the issue with
	 * @param string $id the identifier of the issue to update
	 * @returns PendingLinearObjectRequest<IssuePayload>
	 */
	public function issueUpdateMutation(IssueUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('issueUpdate', IssuePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param IssueUpdateInput $input a partial issue object to update the issues with
	 * @param iterable $ids The id's of the issues to update. Can't be more than 50 at a time.
	 * @returns PendingLinearObjectRequest<IssueBatchPayload>
	 */
	public function issueBatchUpdateMutation(IssueUpdateInput $input, iterable $ids)
	{
		return $this->linearObjectMutation('issueBatchUpdate', IssueBatchPayload::class, compact('input', 'ids'));
	}
	
	/**
	 * @param ?bool $trash whether to trash the issue
	 * @param string $id the identifier of the issue to archive
	 * @returns PendingLinearObjectRequest<IssueArchivePayload>
	 */
	public function issueArchiveMutation(string $id, ?bool $trash = null)
	{
		return $this->linearObjectMutation('issueArchive', IssueArchivePayload::class, compact('id', 'trash'));
	}
	
	/**
	 * @param string $id the identifier of the issue to archive
	 * @returns PendingLinearObjectRequest<IssueArchivePayload>
	 */
	public function issueUnarchiveMutation(string $id)
	{
		return $this->linearObjectMutation('issueUnarchive', IssueArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the issue to delete
	 * @returns PendingLinearObjectRequest<IssueArchivePayload>
	 */
	public function issueDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('issueDelete', IssueArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param string $labelId the identifier of the label to add
	 * @param string $id the identifier of the issue to add the label to
	 * @returns PendingLinearObjectRequest<IssuePayload>
	 */
	public function issueAddLabelMutation(string $labelId, string $id)
	{
		return $this->linearObjectMutation('issueAddLabel', IssuePayload::class, compact('labelId', 'id'));
	}
	
	/**
	 * @param string $labelId the identifier of the label to remove
	 * @param string $id the identifier of the issue to remove the label from
	 * @returns PendingLinearObjectRequest<IssuePayload>
	 */
	public function issueRemoveLabelMutation(string $labelId, string $id)
	{
		return $this->linearObjectMutation('issueRemoveLabel', IssuePayload::class, compact('labelId', 'id'));
	}
	
	/**
	 * @param DateTimeInterface $reminderAt the time when a reminder notification will be sent
	 * @param string $id the identifier of the issue to add a reminder for
	 * @returns PendingLinearObjectRequest<IssuePayload>
	 */
	public function issueReminderMutation(DateTimeInterface $reminderAt, string $id)
	{
		return $this->linearObjectMutation('issueReminder', IssuePayload::class, compact('reminderAt', 'id'));
	}
	
	/**
	 * @param ?string $userId the identifier of the user to subscribe, default is the current user
	 * @param string $id the identifier of the issue to subscribe to
	 * @returns PendingLinearObjectRequest<IssuePayload>
	 */
	public function issueSubscribeMutation(string $id, ?string $userId = null)
	{
		return $this->linearObjectMutation('issueSubscribe', IssuePayload::class, compact('id', 'userId'));
	}
	
	/**
	 * @param ?string $userId the identifier of the user to unsubscribe, default is the current user
	 * @param string $id the identifier of the issue to unsubscribe from
	 * @returns PendingLinearObjectRequest<IssuePayload>
	 */
	public function issueUnsubscribeMutation(string $id, ?string $userId = null)
	{
		return $this->linearObjectMutation('issueUnsubscribe', IssuePayload::class, compact('id', 'userId'));
	}
	
	/**
	 * @param string $description description to update the issue with
	 * @param string $id the identifier of the issue to update
	 * @returns PendingLinearObjectRequest<IssuePayload>
	 */
	public function issueDescriptionUpdateFromFrontMutation(string $description, string $id)
	{
		return $this->linearObjectMutation('issueDescriptionUpdateFromFront', IssuePayload::class, compact('description', 'id'));
	}
	
	/**
	 * @param NotificationUpdateInput $input a partial notification object to update the notification with
	 * @param string $id the identifier of the notification to update
	 * @returns PendingLinearObjectRequest<NotificationPayload>
	 */
	public function notificationUpdateMutation(NotificationUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('notificationUpdate', NotificationPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param DateTimeInterface $readAt the time when notification was marked as read
	 * @param NotificationEntityInput $input the type and id of the entity to archive notifications for
	 * @returns PendingLinearObjectRequest<NotificationBatchActionPayload>
	 */
	public function notificationMarkReadAllMutation(DateTimeInterface $readAt, NotificationEntityInput $input)
	{
		return $this->linearObjectMutation('notificationMarkReadAll', NotificationBatchActionPayload::class, compact('readAt', 'input'));
	}
	
	/**
	 * @param NotificationEntityInput $input the type and id of the entity to archive notifications for
	 * @returns PendingLinearObjectRequest<NotificationBatchActionPayload>
	 */
	public function notificationMarkUnreadAllMutation(NotificationEntityInput $input)
	{
		return $this->linearObjectMutation('notificationMarkUnreadAll', NotificationBatchActionPayload::class, compact('input'));
	}
	
	/**
	 * @param DateTimeInterface $snoozedUntilAt The time until a notification will be snoozed. After that it will appear in the inbox again.
	 * @param NotificationEntityInput $input the type and id of the entity to archive notifications for
	 * @returns PendingLinearObjectRequest<NotificationBatchActionPayload>
	 */
	public function notificationSnoozeAllMutation(DateTimeInterface $snoozedUntilAt, NotificationEntityInput $input)
	{
		return $this->linearObjectMutation('notificationSnoozeAll', NotificationBatchActionPayload::class, compact('snoozedUntilAt', 'input'));
	}
	
	/**
	 * @param DateTimeInterface $unsnoozedAt the time when the notification was unsnoozed
	 * @param NotificationEntityInput $input the type and id of the entity to archive notifications for
	 * @returns PendingLinearObjectRequest<NotificationBatchActionPayload>
	 */
	public function notificationUnsnoozeAllMutation(DateTimeInterface $unsnoozedAt, NotificationEntityInput $input)
	{
		return $this->linearObjectMutation('notificationUnsnoozeAll', NotificationBatchActionPayload::class, compact('unsnoozedAt', 'input'));
	}
	
	/**
	 * @param string $id the id of the notification to archive
	 * @returns PendingLinearObjectRequest<NotificationArchivePayload>
	 */
	public function notificationArchiveMutation(string $id)
	{
		return $this->linearObjectMutation('notificationArchive', NotificationArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param NotificationEntityInput $input the type and id of the entity to archive notifications for
	 * @returns PendingLinearObjectRequest<NotificationBatchActionPayload>
	 */
	public function notificationArchiveAllMutation(NotificationEntityInput $input)
	{
		return $this->linearObjectMutation('notificationArchiveAll', NotificationBatchActionPayload::class, compact('input'));
	}
	
	/**
	 * @param string $id the id of the notification to archive
	 * @returns PendingLinearObjectRequest<NotificationArchivePayload>
	 */
	public function notificationUnarchiveMutation(string $id)
	{
		return $this->linearObjectMutation('notificationUnarchive', NotificationArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param NotificationSubscriptionCreateInput $input the subscription object to create
	 * @returns PendingLinearObjectRequest<NotificationSubscriptionPayload>
	 */
	public function notificationSubscriptionCreateMutation(NotificationSubscriptionCreateInput $input)
	{
		return $this->linearObjectMutation('notificationSubscriptionCreate', NotificationSubscriptionPayload::class, compact('input'));
	}
	
	/**
	 * @param NotificationSubscriptionUpdateInput $input a partial notification subscription object to update the notification subscription with
	 * @param string $id the identifier of the notification subscription to update
	 * @returns PendingLinearObjectRequest<NotificationSubscriptionPayload>
	 */
	public function notificationSubscriptionUpdateMutation(NotificationSubscriptionUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('notificationSubscriptionUpdate', NotificationSubscriptionPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the notification subscription reference to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function notificationSubscriptionDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('notificationSubscriptionDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the ID of the organization domain to claim
	 * @returns PendingLinearObjectRequest<OrganizationDomainSimplePayload>
	 */
	public function organizationDomainClaimMutation(string $id)
	{
		return $this->linearObjectMutation('organizationDomainClaim', OrganizationDomainSimplePayload::class, compact('id'));
	}
	
	/**
	 * @param OrganizationDomainVerificationInput $input the organization domain to verify
	 * @returns PendingLinearObjectRequest<OrganizationDomainPayload>
	 */
	public function organizationDomainVerifyMutation(OrganizationDomainVerificationInput $input)
	{
		return $this->linearObjectMutation('organizationDomainVerify', OrganizationDomainPayload::class, compact('input'));
	}
	
	/**
	 * @param ?bool $triggerEmailVerification whether to trigger an email verification flow during domain creation
	 * @param OrganizationDomainCreateInput $input the organization domain entry to create
	 * @returns PendingLinearObjectRequest<OrganizationDomainPayload>
	 */
	public function organizationDomainCreateMutation(OrganizationDomainCreateInput $input, ?bool $triggerEmailVerification = null)
	{
		return $this->linearObjectMutation('organizationDomainCreate', OrganizationDomainPayload::class, compact('input', 'triggerEmailVerification'));
	}
	
	/**
	 * @param string $id the identifier of the domain to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function organizationDomainDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('organizationDomainDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param OrganizationInviteCreateInput $input the organization invite object to create
	 * @returns PendingLinearObjectRequest<OrganizationInvitePayload>
	 */
	public function organizationInviteCreateMutation(OrganizationInviteCreateInput $input)
	{
		return $this->linearObjectMutation('organizationInviteCreate', OrganizationInvitePayload::class, compact('input'));
	}
	
	/**
	 * @param OrganizationInviteUpdateInput $input the updates to make to the organization invite object
	 * @param string $id the identifier of the organization invite to update
	 * @returns PendingLinearObjectRequest<OrganizationInvitePayload>
	 */
	public function organizationInviteUpdateMutation(OrganizationInviteUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('organizationInviteUpdate', OrganizationInvitePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the organization invite to be re-send
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function resendOrganizationInviteMutation(string $id)
	{
		return $this->linearObjectMutation('resendOrganizationInvite', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the organization invite to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function organizationInviteDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('organizationInviteDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param OrganizationUpdateInput $input a partial organization object to update the organization with
	 * @returns PendingLinearObjectRequest<OrganizationPayload>
	 */
	public function organizationUpdateMutation(OrganizationUpdateInput $input)
	{
		return $this->linearObjectMutation('organizationUpdate', OrganizationPayload::class, compact('input'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<OrganizationDeletePayload>
	 */
	public function organizationDeleteChallengeMutation()
	{
		return $this->linearObjectMutation('organizationDeleteChallenge', OrganizationDeletePayload::class);
	}
	
	/**
	 * @param DeleteOrganizationInput $input information required to delete an organization
	 * @returns PendingLinearObjectRequest<OrganizationDeletePayload>
	 */
	public function organizationDeleteMutation(DeleteOrganizationInput $input)
	{
		return $this->linearObjectMutation('organizationDelete', OrganizationDeletePayload::class, compact('input'));
	}
	
	/**
	 * @returns PendingLinearObjectRequest<OrganizationCancelDeletePayload>
	 */
	public function organizationCancelDeleteMutation()
	{
		return $this->linearObjectMutation('organizationCancelDelete', OrganizationCancelDeletePayload::class);
	}
	
	/**
	 * @returns PendingLinearObjectRequest<OrganizationStartPlusTrialPayload>
	 */
	public function organizationStartPlusTrialMutation()
	{
		return $this->linearObjectMutation('organizationStartPlusTrial', OrganizationStartPlusTrialPayload::class);
	}
	
	/**
	 * @param ProjectLinkCreateInput $input the project link object to create
	 * @returns PendingLinearObjectRequest<ProjectLinkPayload>
	 */
	public function projectLinkCreateMutation(ProjectLinkCreateInput $input)
	{
		return $this->linearObjectMutation('projectLinkCreate', ProjectLinkPayload::class, compact('input'));
	}
	
	/**
	 * @param ProjectLinkUpdateInput $input the project link object to update
	 * @param string $id the identifier of the project link to update
	 * @returns PendingLinearObjectRequest<ProjectLinkPayload>
	 */
	public function projectLinkUpdateMutation(ProjectLinkUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('projectLinkUpdate', ProjectLinkPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the project link to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function projectLinkDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('projectLinkDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param ProjectMilestoneCreateInput $input the project milestone to create
	 * @returns PendingLinearObjectRequest<ProjectMilestonePayload>
	 */
	public function projectMilestoneCreateMutation(ProjectMilestoneCreateInput $input)
	{
		return $this->linearObjectMutation('projectMilestoneCreate', ProjectMilestonePayload::class, compact('input'));
	}
	
	/**
	 * @param ProjectMilestoneUpdateInput $input a partial object to update the project milestone with
	 * @param string $id The identifier of the project milestone to update. Also the identifier from the URL is accepted.
	 * @returns PendingLinearObjectRequest<ProjectMilestonePayload>
	 */
	public function projectMilestoneUpdateMutation(ProjectMilestoneUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('projectMilestoneUpdate', ProjectMilestonePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the project milestone to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function projectMilestoneDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('projectMilestoneDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param ?bool $connectSlackChannel whether to connect a Slack channel to the project
	 * @param ProjectCreateInput $input the issue object to create
	 * @returns PendingLinearObjectRequest<ProjectPayload>
	 */
	public function projectCreateMutation(ProjectCreateInput $input, ?bool $connectSlackChannel = null)
	{
		return $this->linearObjectMutation('projectCreate', ProjectPayload::class, compact('input', 'connectSlackChannel'));
	}
	
	/**
	 * @param ProjectUpdateInput $input a partial project object to update the project with
	 * @param string $id The identifier of the project to update. Also the identifier from the URL is accepted.
	 * @returns PendingLinearObjectRequest<ProjectPayload>
	 */
	public function projectUpdateMutation(ProjectUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('projectUpdate', ProjectPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the project to delete
	 * @returns PendingLinearObjectRequest<ProjectArchivePayload>
	 */
	public function projectDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('projectDelete', ProjectArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param ?bool $trash whether to trash the project
	 * @param string $id The identifier of the project to archive. Also the identifier from the URL is accepted.
	 * @returns PendingLinearObjectRequest<ProjectArchivePayload>
	 */
	public function projectArchiveMutation(string $id, ?bool $trash = null)
	{
		return $this->linearObjectMutation('projectArchive', ProjectArchivePayload::class, compact('id', 'trash'));
	}
	
	/**
	 * @param string $id The identifier of the project to restore. Also the identifier from the URL is accepted.
	 * @returns PendingLinearObjectRequest<ProjectArchivePayload>
	 */
	public function projectUnarchiveMutation(string $id)
	{
		return $this->linearObjectMutation('projectUnarchive', ProjectArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param ProjectUpdateInteractionCreateInput $input data for the project update interaction to create
	 * @returns PendingLinearObjectRequest<ProjectUpdateInteractionPayload>
	 */
	public function projectUpdateInteractionCreateMutation(ProjectUpdateInteractionCreateInput $input)
	{
		return $this->linearObjectMutation('projectUpdateInteractionCreate', ProjectUpdateInteractionPayload::class, compact('input'));
	}
	
	/**
	 * @param ProjectUpdateCreateInput $input data for the project update to create
	 * @returns PendingLinearObjectRequest<ProjectUpdatePayload>
	 */
	public function projectUpdateCreateMutation(ProjectUpdateCreateInput $input)
	{
		return $this->linearObjectMutation('projectUpdateCreate', ProjectUpdatePayload::class, compact('input'));
	}
	
	/**
	 * @param ProjectUpdateUpdateInput $input a data to update the project update with
	 * @param string $id the identifier of the project update to update
	 * @returns PendingLinearObjectRequest<ProjectUpdatePayload>
	 */
	public function projectUpdateUpdateMutation(ProjectUpdateUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('projectUpdateUpdate', ProjectUpdatePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the project update to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function projectUpdateDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('projectUpdateDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the project update
	 * @returns PendingLinearObjectRequest<ProjectUpdateWithInteractionPayload>
	 */
	public function projectUpdateMarkAsReadMutation(string $id)
	{
		return $this->linearObjectMutation('projectUpdateMarkAsRead', ProjectUpdateWithInteractionPayload::class, compact('id'));
	}
	
	/**
	 * @param ?string $userId The user identifier to whom the notification will be sent. By default, it is set to the project lead.
	 * @param string $projectId the identifier of the project to remind about
	 * @returns PendingLinearObjectRequest<ProjectUpdateReminderPayload>
	 */
	public function createProjectUpdateReminderMutation(string $projectId, ?string $userId = null)
	{
		return $this->linearObjectMutation('createProjectUpdateReminder', ProjectUpdateReminderPayload::class, compact('projectId', 'userId'));
	}
	
	/**
	 * @param PushSubscriptionCreateInput $input the push subscription to create
	 * @returns PendingLinearObjectRequest<PushSubscriptionPayload>
	 */
	public function pushSubscriptionCreateMutation(PushSubscriptionCreateInput $input)
	{
		return $this->linearObjectMutation('pushSubscriptionCreate', PushSubscriptionPayload::class, compact('input'));
	}
	
	/**
	 * @param string $id the identifier of the push subscription to delete
	 * @returns PendingLinearObjectRequest<PushSubscriptionPayload>
	 */
	public function pushSubscriptionDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('pushSubscriptionDelete', PushSubscriptionPayload::class, compact('id'));
	}
	
	/**
	 * @param ReactionCreateInput $input the reaction object to create
	 * @returns PendingLinearObjectRequest<ReactionPayload>
	 */
	public function reactionCreateMutation(ReactionCreateInput $input)
	{
		return $this->linearObjectMutation('reactionCreate', ReactionPayload::class, compact('input'));
	}
	
	/**
	 * @param string $id the identifier of the reaction to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function reactionDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('reactionDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param ?iterable $includePrivateTeamIds
	 * @returns PendingLinearObjectRequest<CreateCsvExportReportPayload>
	 */
	public function createCsvExportReportMutation(?iterable $includePrivateTeamIds = null)
	{
		return $this->linearObjectMutation('createCsvExportReport', CreateCsvExportReportPayload::class, compact('includePrivateTeamIds'));
	}
	
	/**
	 * @param RoadmapCreateInput $input the properties of the roadmap to create
	 * @returns PendingLinearObjectRequest<RoadmapPayload>
	 */
	public function roadmapCreateMutation(RoadmapCreateInput $input)
	{
		return $this->linearObjectMutation('roadmapCreate', RoadmapPayload::class, compact('input'));
	}
	
	/**
	 * @param RoadmapUpdateInput $input the properties of the roadmap to update
	 * @param string $id the identifier of the roadmap to update
	 * @returns PendingLinearObjectRequest<RoadmapPayload>
	 */
	public function roadmapUpdateMutation(RoadmapUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('roadmapUpdate', RoadmapPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the roadmap to archive
	 * @returns PendingLinearObjectRequest<RoadmapArchivePayload>
	 */
	public function roadmapArchiveMutation(string $id)
	{
		return $this->linearObjectMutation('roadmapArchive', RoadmapArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the roadmap to unarchive
	 * @returns PendingLinearObjectRequest<RoadmapArchivePayload>
	 */
	public function roadmapUnarchiveMutation(string $id)
	{
		return $this->linearObjectMutation('roadmapUnarchive', RoadmapArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the roadmap to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function roadmapDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('roadmapDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param RoadmapToProjectCreateInput $input the properties of the roadmapToProject to create
	 * @returns PendingLinearObjectRequest<RoadmapToProjectPayload>
	 */
	public function roadmapToProjectCreateMutation(RoadmapToProjectCreateInput $input)
	{
		return $this->linearObjectMutation('roadmapToProjectCreate', RoadmapToProjectPayload::class, compact('input'));
	}
	
	/**
	 * @param RoadmapToProjectUpdateInput $input the properties of the roadmapToProject to update
	 * @param string $id the identifier of the roadmapToProject to update
	 * @returns PendingLinearObjectRequest<RoadmapToProjectPayload>
	 */
	public function roadmapToProjectUpdateMutation(RoadmapToProjectUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('roadmapToProjectUpdate', RoadmapToProjectPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the roadmapToProject to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function roadmapToProjectDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('roadmapToProjectDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the team key to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function teamKeyDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('teamKeyDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param TeamMembershipCreateInput $input the team membership object to create
	 * @returns PendingLinearObjectRequest<TeamMembershipPayload>
	 */
	public function teamMembershipCreateMutation(TeamMembershipCreateInput $input)
	{
		return $this->linearObjectMutation('teamMembershipCreate', TeamMembershipPayload::class, compact('input'));
	}
	
	/**
	 * @param TeamMembershipUpdateInput $input a partial team membership object to update the team membership with
	 * @param string $id the identifier of the team membership to update
	 * @returns PendingLinearObjectRequest<TeamMembershipPayload>
	 */
	public function teamMembershipUpdateMutation(TeamMembershipUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('teamMembershipUpdate', TeamMembershipPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the team membership to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function teamMembershipDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('teamMembershipDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param ?string $copySettingsFromTeamId the team id to copy settings from
	 * @param TeamCreateInput $input the team object to create
	 * @returns PendingLinearObjectRequest<TeamPayload>
	 */
	public function teamCreateMutation(TeamCreateInput $input, ?string $copySettingsFromTeamId = null)
	{
		return $this->linearObjectMutation('teamCreate', TeamPayload::class, compact('input', 'copySettingsFromTeamId'));
	}
	
	/**
	 * @param TeamUpdateInput $input a partial team object to update the team with
	 * @param string $id the identifier of the team to update
	 * @returns PendingLinearObjectRequest<TeamPayload>
	 */
	public function teamUpdateMutation(TeamUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('teamUpdate', TeamPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the team to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function teamDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('teamDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the team to delete
	 * @returns PendingLinearObjectRequest<TeamArchivePayload>
	 */
	public function teamUnarchiveMutation(string $id)
	{
		return $this->linearObjectMutation('teamUnarchive', TeamArchivePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the team, which cycles will be deleted
	 * @returns PendingLinearObjectRequest<TeamPayload>
	 */
	public function teamCyclesDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('teamCyclesDelete', TeamPayload::class, compact('id'));
	}
	
	/**
	 * @param TemplateCreateInput $input the template object to create
	 * @returns PendingLinearObjectRequest<TemplatePayload>
	 */
	public function templateCreateMutation(TemplateCreateInput $input)
	{
		return $this->linearObjectMutation('templateCreate', TemplatePayload::class, compact('input'));
	}
	
	/**
	 * @param TemplateUpdateInput $input the properties of the template to update
	 * @param string $id the identifier of the template
	 * @returns PendingLinearObjectRequest<TemplatePayload>
	 */
	public function templateUpdateMutation(TemplateUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('templateUpdate', TemplatePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the template to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function templateDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('templateDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param TimeScheduleCreateInput $input the properties of the time schedule to create
	 * @returns PendingLinearObjectRequest<TimeSchedulePayload>
	 */
	public function timeScheduleCreateMutation(TimeScheduleCreateInput $input)
	{
		return $this->linearObjectMutation('timeScheduleCreate', TimeSchedulePayload::class, compact('input'));
	}
	
	/**
	 * @param TimeScheduleUpdateInput $input the properties of the time schedule to update
	 * @param string $id the identifier of the time schedule to update
	 * @returns PendingLinearObjectRequest<TimeSchedulePayload>
	 */
	public function timeScheduleUpdateMutation(TimeScheduleUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('timeScheduleUpdate', TimeSchedulePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param TimeScheduleUpdateInput $input the properties of the time schedule to insert or update
	 * @param string $externalId the unique identifier of the external schedule
	 * @returns PendingLinearObjectRequest<TimeSchedulePayload>
	 */
	public function timeScheduleUpsertExternalMutation(TimeScheduleUpdateInput $input, string $externalId)
	{
		return $this->linearObjectMutation('timeScheduleUpsertExternal', TimeSchedulePayload::class, compact('input', 'externalId'));
	}
	
	/**
	 * @param string $id the identifier of the time schedule to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function timeScheduleDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('timeScheduleDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the time schedule to refresh
	 * @returns PendingLinearObjectRequest<TimeSchedulePayload>
	 */
	public function timeScheduleRefreshIntegrationScheduleMutation(string $id)
	{
		return $this->linearObjectMutation('timeScheduleRefreshIntegrationSchedule', TimeSchedulePayload::class, compact('id'));
	}
	
	/**
	 * @param TriageResponsibilityCreateInput $input the properties of the triage responsibility to create
	 * @returns PendingLinearObjectRequest<TriageResponsibilityPayload>
	 */
	public function triageResponsibilityCreateMutation(TriageResponsibilityCreateInput $input)
	{
		return $this->linearObjectMutation('triageResponsibilityCreate', TriageResponsibilityPayload::class, compact('input'));
	}
	
	/**
	 * @param TriageResponsibilityUpdateInput $input the properties of the triage responsibility to update
	 * @param string $id the identifier of the triage responsibility to update
	 * @returns PendingLinearObjectRequest<TriageResponsibilityPayload>
	 */
	public function triageResponsibilityUpdateMutation(TriageResponsibilityUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('triageResponsibilityUpdate', TriageResponsibilityPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the triage responsibility to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function triageResponsibilityDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('triageResponsibilityDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param UserUpdateInput $input a partial user object to update the user with
	 * @param string $id The identifier of the user to update. Use `me` to reference currently authenticated user.
	 * @returns PendingLinearObjectRequest<UserPayload>
	 */
	public function userUpdateMutation(UserUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('userUpdate', UserPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $redirectUri the Discord OAuth redirect URI
	 * @param string $code the Discord OAuth code
	 * @returns PendingLinearObjectRequest<UserPayload>
	 */
	public function userDiscordConnectMutation(string $redirectUri, string $code)
	{
		return $this->linearObjectMutation('userDiscordConnect', UserPayload::class, compact('redirectUri', 'code'));
	}
	
	/**
	 * @param string $service the external service to disconnect
	 * @returns PendingLinearObjectRequest<UserPayload>
	 */
	public function userExternalUserDisconnectMutation(string $service)
	{
		return $this->linearObjectMutation('userExternalUserDisconnect', UserPayload::class, compact('service'));
	}
	
	/**
	 * @param string $id the identifier of the user to make an admin
	 * @returns PendingLinearObjectRequest<UserAdminPayload>
	 */
	public function userPromoteAdminMutation(string $id)
	{
		return $this->linearObjectMutation('userPromoteAdmin', UserAdminPayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the user to make a regular user
	 * @returns PendingLinearObjectRequest<UserAdminPayload>
	 */
	public function userDemoteAdminMutation(string $id)
	{
		return $this->linearObjectMutation('userDemoteAdmin', UserAdminPayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the user to make a regular user
	 * @returns PendingLinearObjectRequest<UserAdminPayload>
	 */
	public function userPromoteMemberMutation(string $id)
	{
		return $this->linearObjectMutation('userPromoteMember', UserAdminPayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the user to make a guest
	 * @returns PendingLinearObjectRequest<UserAdminPayload>
	 */
	public function userDemoteMemberMutation(string $id)
	{
		return $this->linearObjectMutation('userDemoteMember', UserAdminPayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the user to suspend
	 * @returns PendingLinearObjectRequest<UserAdminPayload>
	 */
	public function userSuspendMutation(string $id)
	{
		return $this->linearObjectMutation('userSuspend', UserAdminPayload::class, compact('id'));
	}
	
	/**
	 * @param string $id the identifier of the user to unsuspend
	 * @returns PendingLinearObjectRequest<UserAdminPayload>
	 */
	public function userUnsuspendMutation(string $id)
	{
		return $this->linearObjectMutation('userUnsuspend', UserAdminPayload::class, compact('id'));
	}
	
	/**
	 * @param UserSettingsUpdateInput $input a partial notification object to update the settings with
	 * @param string $id the identifier of the userSettings to update
	 * @returns PendingLinearObjectRequest<UserSettingsPayload>
	 */
	public function userSettingsUpdateMutation(UserSettingsUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('userSettingsUpdate', UserSettingsPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $flag flag to increment
	 * @returns PendingLinearObjectRequest<UserSettingsFlagPayload>
	 */
	public function userSettingsFlagIncrementMutation(string $flag)
	{
		return $this->linearObjectMutation('userSettingsFlagIncrement', UserSettingsFlagPayload::class, compact('flag'));
	}
	
	/**
	 * @param ?iterable $flags The flags to reset. If not provided all flags will be reset.
	 * @returns PendingLinearObjectRequest<UserSettingsFlagsResetPayload>
	 */
	public function userSettingsFlagsResetMutation(?iterable $flags = null)
	{
		return $this->linearObjectMutation('userSettingsFlagsReset', UserSettingsFlagsResetPayload::class, compact('flags'));
	}
	
	/**
	 * @param UserFlagUpdateOperation $operation flag operation to perform
	 * @param UserFlagType $flag settings flag to increment
	 * @returns PendingLinearObjectRequest<UserSettingsFlagPayload>
	 */
	public function userFlagUpdateMutation(UserFlagUpdateOperation $operation, UserFlagType $flag)
	{
		return $this->linearObjectMutation('userFlagUpdate', UserSettingsFlagPayload::class, compact('operation', 'flag'));
	}
	
	/**
	 * @param ViewPreferencesCreateInput $input the ViewPreferences object to create
	 * @returns PendingLinearObjectRequest<ViewPreferencesPayload>
	 */
	public function viewPreferencesCreateMutation(ViewPreferencesCreateInput $input)
	{
		return $this->linearObjectMutation('viewPreferencesCreate', ViewPreferencesPayload::class, compact('input'));
	}
	
	/**
	 * @param ViewPreferencesUpdateInput $input the properties of the view preferences
	 * @param string $id the identifier of the ViewPreferences object
	 * @returns PendingLinearObjectRequest<ViewPreferencesPayload>
	 */
	public function viewPreferencesUpdateMutation(ViewPreferencesUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('viewPreferencesUpdate', ViewPreferencesPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the ViewPreferences to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function viewPreferencesDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('viewPreferencesDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param WebhookCreateInput $input the webhook object to create
	 * @returns PendingLinearObjectRequest<WebhookPayload>
	 */
	public function webhookCreateMutation(WebhookCreateInput $input)
	{
		return $this->linearObjectMutation('webhookCreate', WebhookPayload::class, compact('input'));
	}
	
	/**
	 * @param WebhookUpdateInput $input the properties of the Webhook
	 * @param string $id the identifier of the Webhook
	 * @returns PendingLinearObjectRequest<WebhookPayload>
	 */
	public function webhookUpdateMutation(WebhookUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('webhookUpdate', WebhookPayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the Webhook to delete
	 * @returns PendingLinearObjectRequest<DeletePayload>
	 */
	public function webhookDeleteMutation(string $id)
	{
		return $this->linearObjectMutation('webhookDelete', DeletePayload::class, compact('id'));
	}
	
	/**
	 * @param WorkflowStateCreateInput $input the state to create
	 * @returns PendingLinearObjectRequest<WorkflowStatePayload>
	 */
	public function workflowStateCreateMutation(WorkflowStateCreateInput $input)
	{
		return $this->linearObjectMutation('workflowStateCreate', WorkflowStatePayload::class, compact('input'));
	}
	
	/**
	 * @param WorkflowStateUpdateInput $input a partial state object to update
	 * @param string $id the identifier of the state to update
	 * @returns PendingLinearObjectRequest<WorkflowStatePayload>
	 */
	public function workflowStateUpdateMutation(WorkflowStateUpdateInput $input, string $id)
	{
		return $this->linearObjectMutation('workflowStateUpdate', WorkflowStatePayload::class, compact('input', 'id'));
	}
	
	/**
	 * @param string $id the identifier of the state to archive
	 * @returns PendingLinearObjectRequest<WorkflowStateArchivePayload>
	 */
	public function workflowStateArchiveMutation(string $id)
	{
		return $this->linearObjectMutation('workflowStateArchive', WorkflowStateArchivePayload::class, compact('id'));
	}
}
