<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueSearchPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\SearchIssuesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingSearchIssuesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'nodes.id',
		'nodes.createdAt',
		'nodes.updatedAt',
		'nodes.number',
		'nodes.title',
		'nodes.priority',
		'nodes.boardOrder',
		'nodes.sortOrder',
		'nodes.labelIds',
		'nodes.previousIdentifiers',
		'nodes.priorityLabel',
		'nodes.identifier',
		'nodes.url',
		'nodes.branchName',
		'nodes.customerTicketCount',
		'nodes.metadata',
		'nodes.archivedAt',
		'nodes.estimate',
		'nodes.startedAt',
		'nodes.completedAt',
		'nodes.startedTriageAt',
		'nodes.triagedAt',
		'nodes.canceledAt',
		'nodes.autoClosedAt',
		'nodes.autoArchivedAt',
		'nodes.dueDate',
		'nodes.slaStartedAt',
		'nodes.slaBreachesAt',
		'nodes.trashed',
		'nodes.snoozedUntilAt',
		'nodes.subIssueSortOrder',
		'nodes.integrationSourceType',
		'nodes.description',
		'nodes.descriptionData',
		'nodes.descriptionState',
		'totalCount',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'searchIssues', $args));
	}
	
	public function get(string ...$fields): IssueSearchPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): SearchIssuesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(SearchIssuesQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof SearchIssuesQueryResponse);
		
		return $response;
	}
}
