<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TimeScheduleConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TimeSchedulesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTimeSchedulesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.archivedAt', 'nodes.externalId', 'nodes.externalUrl'];

	protected const ARGUMENT_TYPES = ['before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'timeSchedules', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): TimeScheduleConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): TimeSchedulesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TimeSchedulesQueryResponse::class, $query))->throw();
		
		assert($response instanceof TimeSchedulesQueryResponse);
		
		return $response;
	}
}
