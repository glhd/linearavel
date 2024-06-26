<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueFigmaFileKeySearchQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueFigmaFileKeySearchQueryRequest extends PendingLinearRequest
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
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueFigmaFileKeySearch', $args));
	}
	
	public function get(string ...$fields): IssueConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssueFigmaFileKeySearchQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueFigmaFileKeySearchQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueFigmaFileKeySearchQueryResponse);
		
		return $response;
	}
}
