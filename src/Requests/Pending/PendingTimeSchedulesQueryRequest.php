<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TimeScheduleConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TimeSchedulesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTimeSchedulesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.archivedAt', 'nodes.externalId', 'nodes.externalUrl'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'timeSchedules', $args));
	}
	
	public function get(string ...$fields): TimeScheduleConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TimeSchedulesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TimeSchedulesQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof TimeSchedulesQueryResponse);
		
		return $response;
	}
}
