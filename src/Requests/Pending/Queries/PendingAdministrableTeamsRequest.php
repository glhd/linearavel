<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TeamConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AdministrableTeamsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAdministrableTeamsRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'nodes.id',
		'nodes.createdAt',
		'nodes.updatedAt',
		'nodes.name',
		'nodes.key',
		'nodes.cyclesEnabled',
		'nodes.cycleStartDay',
		'nodes.cycleDuration',
		'nodes.cycleCooldownTime',
		'nodes.cycleIssueAutoAssignStarted',
		'nodes.cycleIssueAutoAssignCompleted',
		'nodes.cycleLockToActive',
		'nodes.upcomingCycleCount',
		'nodes.timezone',
		'nodes.inviteHash',
		'nodes.issueEstimationType',
		'nodes.issueOrderingNoPriorityFirst',
		'nodes.issueEstimationAllowZero',
		'nodes.setIssueSortOrderOnStateChange',
		'nodes.issueEstimationExtended',
		'nodes.defaultIssueEstimate',
		'nodes.triageEnabled',
		'nodes.requirePriorityToLeaveTriage',
		'nodes.private',
		'nodes.groupIssueHistory',
		'nodes.slackNewIssue',
		'nodes.slackIssueComments',
		'nodes.slackIssueStatuses',
		'nodes.autoArchivePeriod',
		'nodes.cycleCalenderUrl',
		'nodes.issueCount',
		'nodes.issueSortOrderDefaultToBottom',
		'nodes.archivedAt',
		'nodes.description',
		'nodes.icon',
		'nodes.color',
		'nodes.defaultTemplateForMembersId',
		'nodes.defaultTemplateForNonMembersId',
		'nodes.autoClosePeriod',
		'nodes.autoCloseStateId',
		'nodes.joinByDefault',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'administrableTeams', $args));
	}
	
	public function get(string ...$fields): TeamConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): AdministrableTeamsResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AdministrableTeamsResponse::class, (string) $query))->throw();
		
		assert($response instanceof AdministrableTeamsResponse);
		
		return $response;
	}
}
