<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TeamConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AdministrableTeamsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAdministrableTeamsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.key', 'nodes.cyclesEnabled', 'nodes.cycleStartDay', 'nodes.cycleDuration', 'nodes.cycleCooldownTime', 'nodes.cycleIssueAutoAssignStarted', 'nodes.cycleIssueAutoAssignCompleted', 'nodes.cycleLockToActive', 'nodes.upcomingCycleCount', 'nodes.timezone', 'nodes.inheritWorkflowStatuses', 'nodes.inheritProjectStatuses', 'nodes.inheritIssueEstimation', 'nodes.issueEstimationType', 'nodes.issueOrderingNoPriorityFirst', 'nodes.issueEstimationAllowZero', 'nodes.setIssueSortOrderOnStateChange', 'nodes.issueEstimationExtended', 'nodes.defaultIssueEstimate', 'nodes.triageEnabled', 'nodes.requirePriorityToLeaveTriage', 'nodes.private', 'nodes.securitySettings', 'nodes.scimManaged', 'nodes.progressHistory', 'nodes.currentProgress', 'nodes.groupIssueHistory', 'nodes.aiThreadSummariesEnabled', 'nodes.aiDiscussionSummariesEnabled', 'nodes.slackNewIssue', 'nodes.slackIssueComments', 'nodes.slackIssueStatuses', 'nodes.autoArchivePeriod', 'nodes.inheritSlackAutoCreateProjectChannel', 'nodes.cycleCalenderUrl', 'nodes.visibility', 'nodes.displayName', 'nodes.issueCount', 'nodes.ledInitiativeCount', 'nodes.initiativesEnabled', 'nodes.issueSortOrderDefaultToBottom', 'nodes.inviteHash', 'nodes.archivedAt', 'nodes.description', 'nodes.icon', 'nodes.color', 'nodes.retiredAt', 'nodes.defaultTemplateForMembersId', 'nodes.defaultTemplateForNonMembersId', 'nodes.allMembersCanJoin', 'nodes.scimGroupName', 'nodes.autoClosePeriod', 'nodes.autoCloseStateId', 'nodes.autoCloseParentIssues', 'nodes.autoCloseChildIssues', 'nodes.joinByDefault', 'nodes.slackAutoCreateProjectChannel', 'nodes.restrictedById', 'nodes.protectedById'];

	protected const ARGUMENT_TYPES = ['filter' => 'TeamFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'administrableTeams', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): TeamConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AdministrableTeamsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AdministrableTeamsQueryResponse::class, $query))->throw();
		
		assert($response instanceof AdministrableTeamsQueryResponse);
		
		return $response;
	}
}
