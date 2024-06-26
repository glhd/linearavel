<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Team;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ArchivedTeamsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingArchivedTeamsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'id',
		'createdAt',
		'updatedAt',
		'name',
		'key',
		'cyclesEnabled',
		'cycleStartDay',
		'cycleDuration',
		'cycleCooldownTime',
		'cycleIssueAutoAssignStarted',
		'cycleIssueAutoAssignCompleted',
		'cycleLockToActive',
		'upcomingCycleCount',
		'timezone',
		'inviteHash',
		'issueEstimationType',
		'issueOrderingNoPriorityFirst',
		'issueEstimationAllowZero',
		'setIssueSortOrderOnStateChange',
		'issueEstimationExtended',
		'defaultIssueEstimate',
		'triageEnabled',
		'requirePriorityToLeaveTriage',
		'private',
		'groupIssueHistory',
		'slackNewIssue',
		'slackIssueComments',
		'slackIssueStatuses',
		'autoArchivePeriod',
		'cycleCalenderUrl',
		'issueCount',
		'issueSortOrderDefaultToBottom',
		'archivedAt',
		'description',
		'icon',
		'color',
		'defaultTemplateForMembersId',
		'defaultTemplateForNonMembersId',
		'autoClosePeriod',
		'autoCloseStateId',
		'joinByDefault',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'archivedTeams', $args));
	}
	
	/** @returns Collection<int, Team> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ArchivedTeamsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ArchivedTeamsQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof ArchivedTeamsQueryResponse);
		
		return $response;
	}
}
