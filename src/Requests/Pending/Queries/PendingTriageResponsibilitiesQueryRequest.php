<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TriageResponsibilityConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TriageResponsibilitiesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTriageResponsibilitiesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.action', 'nodes.archivedAt'];

	protected const ARGUMENT_TYPES = ['before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'triageResponsibilities', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): TriageResponsibilityConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): TriageResponsibilitiesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TriageResponsibilitiesQueryResponse::class, $query))->throw();
		
		assert($response instanceof TriageResponsibilitiesQueryResponse);
		
		return $response;
	}
}
