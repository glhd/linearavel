<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectStatusConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectStatusesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectStatusesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.color', 'nodes.position', 'nodes.type', 'nodes.indefinite', 'nodes.archivedAt', 'nodes.description', 'nodes.teamId'];

	protected const ARGUMENT_TYPES = ['before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'projectStatuses', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ProjectStatusConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ProjectStatusesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectStatusesQueryResponse::class, $query))->throw();
		
		assert($response instanceof ProjectStatusesQueryResponse);
		
		return $response;
	}
}
