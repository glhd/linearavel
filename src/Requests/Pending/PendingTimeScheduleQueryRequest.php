<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TimeSchedule;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TimeScheduleQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTimeScheduleQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'archivedAt', 'externalId', 'externalUrl'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'timeSchedule', $args));
	}
	
	public function get(string ...$fields): TimeSchedule
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TimeScheduleQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TimeScheduleQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof TimeScheduleQueryResponse);
		
		return $response;
	}
}
