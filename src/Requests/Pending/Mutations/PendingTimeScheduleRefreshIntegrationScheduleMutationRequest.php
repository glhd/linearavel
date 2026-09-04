<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TimeSchedulePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\TimeScheduleRefreshIntegrationScheduleMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTimeScheduleRefreshIntegrationScheduleMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'timeScheduleRefreshIntegrationSchedule', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): TimeSchedulePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): TimeScheduleRefreshIntegrationScheduleMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TimeScheduleRefreshIntegrationScheduleMutationResponse::class, $query))->throw();
		
		assert($response instanceof TimeScheduleRefreshIntegrationScheduleMutationResponse);
		
		return $response;
	}
}
