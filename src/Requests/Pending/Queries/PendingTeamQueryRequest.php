<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Team;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TeamQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTeamQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'key', 'cyclesEnabled', 'cycleStartDay', 'cycleDuration', 'cycleCooldownTime', 'cycleIssueAutoAssignStarted', 'cycleIssueAutoAssignCompleted', 'cycleLockToActive', 'upcomingCycleCount', 'timezone', 'inheritWorkflowStatuses', 'inheritProjectStatuses', 'inheritIssueEstimation', 'issueEstimationType', 'issueOrderingNoPriorityFirst', 'issueEstimationAllowZero', 'setIssueSortOrderOnStateChange', 'issueEstimationExtended', 'defaultIssueEstimate', 'triageEnabled', 'requirePriorityToLeaveTriage', 'private', 'securitySettings', 'scimManaged', 'progressHistory', 'currentProgress', 'groupIssueHistory', 'aiThreadSummariesEnabled', 'aiDiscussionSummariesEnabled', 'slackNewIssue', 'slackIssueComments', 'slackIssueStatuses', 'autoArchivePeriod', 'inheritSlackAutoCreateProjectChannel', 'cycleCalenderUrl', 'visibility', 'displayName', 'issueCount', 'ledInitiativeCount', 'initiativesEnabled', 'issueSortOrderDefaultToBottom', 'inviteHash', 'archivedAt', 'description', 'icon', 'color', 'retiredAt', 'defaultTemplateForMembersId', 'defaultTemplateForNonMembersId', 'allMembersCanJoin', 'scimGroupName', 'autoClosePeriod', 'autoCloseStateId', 'autoCloseParentIssues', 'autoCloseChildIssues', 'joinByDefault', 'slackAutoCreateProjectChannel', 'restrictedById', 'protectedById'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'team', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): Team
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): TeamQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TeamQueryResponse::class, $query))->throw();
		
		assert($response instanceof TeamQueryResponse);
		
		return $response;
	}
}
