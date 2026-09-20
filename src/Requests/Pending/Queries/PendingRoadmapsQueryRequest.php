<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\RoadmapConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\RoadmapsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingRoadmapsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.slugId', 'nodes.sortOrder', 'nodes.archivedAt', 'nodes.description', 'nodes.color'];

	protected const ARGUMENT_TYPES = ['before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'roadmaps', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): RoadmapConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): RoadmapsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(RoadmapsQueryResponse::class, $query))->throw();
		
		assert($response instanceof RoadmapsQueryResponse);
		
		return $response;
	}
}
