<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ReleaseStageConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ReleaseStagesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReleaseStagesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.color', 'nodes.type', 'nodes.position', 'nodes.frozen', 'nodes.archivedAt'];

	protected const ARGUMENT_TYPES = ['filter' => 'ReleaseStageFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'releaseStages', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ReleaseStageConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ReleaseStagesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReleaseStagesQueryResponse::class, $query))->throw();
		
		assert($response instanceof ReleaseStagesQueryResponse);
		
		return $response;
	}
}
