<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CycleConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CyclesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCyclesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.number', 'nodes.startsAt', 'nodes.endsAt', 'nodes.issueCountHistory', 'nodes.completedIssueCountHistory', 'nodes.scopeHistory', 'nodes.completedScopeHistory', 'nodes.inProgressScopeHistory', 'nodes.progress', 'nodes.archivedAt', 'nodes.name', 'nodes.description', 'nodes.completedAt', 'nodes.autoArchivedAt'];

	protected const ARGUMENT_TYPES = ['filter' => 'CycleFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'cycles', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CycleConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CyclesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CyclesQueryResponse::class, $query))->throw();
		
		assert($response instanceof CyclesQueryResponse);
		
		return $response;
	}
}
