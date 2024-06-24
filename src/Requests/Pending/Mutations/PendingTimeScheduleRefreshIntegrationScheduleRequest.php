<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TimeSchedulePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\TimeScheduleRefreshIntegrationScheduleResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTimeScheduleRefreshIntegrationScheduleRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'timeScheduleRefreshIntegrationSchedule', $args));
	}
	
	public function get(string ...$fields): TimeSchedulePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TimeScheduleRefreshIntegrationScheduleResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(TimeScheduleRefreshIntegrationScheduleResponse::class, (string) $query))->throw();
		
		assert($response instanceof TimeScheduleRefreshIntegrationScheduleResponse);
		
		return $response;
	}
}
