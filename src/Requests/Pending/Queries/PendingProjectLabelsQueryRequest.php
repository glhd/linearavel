<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectLabelConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectLabelsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectLabelsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.color', 'nodes.isGroup', 'nodes.archivedAt', 'nodes.description', 'nodes.lastAppliedAt', 'nodes.retiredAt'];

	protected const ARGUMENT_TYPES = ['filter' => 'ProjectLabelFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'projectLabels', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ProjectLabelConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ProjectLabelsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectLabelsQueryResponse::class, $query))->throw();
		
		assert($response instanceof ProjectLabelsQueryResponse);
		
		return $response;
	}
}
