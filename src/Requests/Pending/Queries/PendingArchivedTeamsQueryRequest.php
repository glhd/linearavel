<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Team;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ArchivedTeamsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingArchivedTeamsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'key', 'cyclesEnabled', 'cycleStartDay', 'cycleDuration', 'cycleCooldownTime', 'cycleIssueAutoAssignStarted', 'cycleIssueAutoAssignCompleted', 'cycleLockToActive', 'upcomingCycleCount', 'timezone', 'inheritWorkflowStatuses', 'inheritProjectStatuses', 'inheritIssueEstimation', 'issueEstimationType', 'issueOrderingNoPriorityFirst', 'issueEstimationAllowZero', 'setIssueSortOrderOnStateChange', 'issueEstimationExtended', 'defaultIssueEstimate', 'triageEnabled', 'requirePriorityToLeaveTriage', 'private', 'securitySettings', 'scimManaged', 'progressHistory', 'currentProgress', 'groupIssueHistory', 'aiThreadSummariesEnabled', 'aiDiscussionSummariesEnabled', 'slackNewIssue', 'slackIssueComments', 'slackIssueStatuses', 'autoArchivePeriod', 'inheritSlackAutoCreateProjectChannel', 'cycleCalenderUrl', 'visibility', 'displayName', 'issueCount', 'ledInitiativeCount', 'initiativesEnabled', 'issueSortOrderDefaultToBottom', 'inviteHash', 'archivedAt', 'description', 'icon', 'color', 'retiredAt', 'defaultTemplateForMembersId', 'defaultTemplateForNonMembersId', 'allMembersCanJoin', 'scimGroupName', 'autoClosePeriod', 'autoCloseStateId', 'autoCloseParentIssues', 'autoCloseChildIssues', 'joinByDefault', 'slackAutoCreateProjectChannel', 'restrictedById', 'protectedById'];

	protected const ARGUMENT_TYPES = [];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'archivedTeams', $args, static::ARGUMENT_TYPES));
	}

	/** @returns Collection<int, Team> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ArchivedTeamsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ArchivedTeamsQueryResponse::class, $query))->throw();
		
		assert($response instanceof ArchivedTeamsQueryResponse);
		
		return $response;
	}
}
