<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueSearchQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueSearchQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.number', 'nodes.title', 'nodes.priority', 'nodes.boardOrder', 'nodes.sortOrder', 'nodes.labelIds', 'nodes.previousIdentifiers', 'nodes.priorityLabel', 'nodes.identifier', 'nodes.url', 'nodes.branchName', 'nodes.customerTicketCount', 'nodes.archivedAt', 'nodes.estimate', 'nodes.startedAt', 'nodes.completedAt', 'nodes.startedTriageAt', 'nodes.triagedAt', 'nodes.canceledAt', 'nodes.autoClosedAt', 'nodes.autoArchivedAt', 'nodes.dueDate', 'nodes.slaStartedAt', 'nodes.slaBreachesAt', 'nodes.trashed', 'nodes.snoozedUntilAt', 'nodes.subIssueSortOrder', 'nodes.integrationSourceType', 'nodes.description', 'nodes.descriptionData', 'nodes.descriptionState'];

	protected const ARGUMENT_TYPES = ['filter' => 'IssueFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy', 'query' => 'String'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueSearch', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueSearchQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueSearchQueryResponse::class, $query))->throw();
		
		assert($response instanceof IssueSearchQueryResponse);
		
		return $response;
	}
}
