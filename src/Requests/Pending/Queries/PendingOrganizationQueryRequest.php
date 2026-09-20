<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Organization;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\OrganizationQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'urlKey', 'periodUploadVolume', 'gitLinkbackMessagesEnabled', 'gitPublicLinkbackMessagesEnabled', 'gitLinkbackDescriptionsEnabled', 'roadmapEnabled', 'projectUpdateRemindersDay', 'projectUpdateRemindersHour', 'initiativeUpdateRemindersDay', 'initiativeUpdateRemindersHour', 'fiscalYearStartMonth', 'workingDays', 'samlEnabled', 'scimEnabled', 'securitySettings', 'authSettings', 'allowedAuthServices', 'previousUrlKeys', 'hipaaComplianceEnabled', 'releaseChannel', 'customersConfiguration', 'codeIntelligenceEnabled', 'feedEnabled', 'hideNonPrimaryOrganizations', 'aiAddonEnabled', 'agentAutomationEnabled', 'generatedUpdatesEnabled', 'aiTelemetryEnabled', 'aiThreadSummariesEnabled', 'aiDiscussionSummariesEnabled', 'pullRequestTourEnabled', 'pullRequestIssueMode', 'linearAgentEnabled', 'linearAgentSettings', 'codingAgentEnabled', 'codingAgentSettings', 'slaDayCount', 'projectUpdatesReminderFrequency', 'allowedAiProviders', 'slackProjectChannelPrefix', 'slackProjectChannelsEnabled', 'slackAutoCreateProjectChannel', 'userCount', 'createdIssueCount', 'customerCount', 'customersEnabled', 'releasesEnabled', 'archivedAt', 'logoUrl', 'gitBranchFormat', 'projectUpdateReminderFrequencyInWeeks', 'initiativeUpdateReminderFrequencyInWeeks', 'defaultHomeView', 'defaultHomeViewTargetId', 'samlSettings', 'scimSettings', 'allowedFileUploadContentTypes', 'deletionRequestedAt', 'trialEndsAt', 'trialStartsAt', 'restrictAgentInvocationToMembers', 'themeSettings', 'codeIntelligenceRepository', 'defaultFeedSummarySchedule', 'aiProviderConfiguration', 'allowMembersToInvite', 'restrictTeamCreationToAdmins', 'restrictLabelManagementToAdmins'];

	protected const ARGUMENT_TYPES = [];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'organization', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): Organization
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OrganizationQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OrganizationQueryResponse::class, $query))->throw();
		
		assert($response instanceof OrganizationQueryResponse);
		
		return $response;
	}
}
