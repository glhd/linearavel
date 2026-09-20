<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectRelationConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectRelationsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectRelationsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.type', 'nodes.anchorType', 'nodes.relatedAnchorType', 'nodes.archivedAt'];

	protected const ARGUMENT_TYPES = ['before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'projectRelations', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ProjectRelationConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ProjectRelationsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectRelationsQueryResponse::class, $query))->throw();
		
		assert($response instanceof ProjectRelationsQueryResponse);
		
		return $response;
	}
}
