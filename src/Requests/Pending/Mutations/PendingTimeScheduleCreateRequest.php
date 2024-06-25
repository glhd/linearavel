<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TimeSchedulePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\TimeScheduleCreateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTimeScheduleCreateRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'timeScheduleCreate', $args));
	}
	
	public function get(string ...$fields): TimeSchedulePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TimeScheduleCreateResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TimeScheduleCreateResponse::class, (string) $query))->throw();
		
		assert($response instanceof TimeScheduleCreateResponse);
		
		return $response;
	}
}
