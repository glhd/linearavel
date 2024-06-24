<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TimeScheduleConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TimeSchedulesResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTimeSchedulesRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'timeSchedules', $args));
	}
	
	public function get(string ...$fields): TimeScheduleConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TimeSchedulesResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(TimeSchedulesResponse::class, (string) $query))->throw();
		
		assert($response instanceof TimeSchedulesResponse);
		
		return $response;
	}
}
