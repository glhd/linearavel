<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TimeSchedulePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\TimeScheduleUpsertExternalMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTimeScheduleUpsertExternalMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'timeScheduleUpsertExternal', $args));
	}
	
	public function get(string ...$fields): TimeSchedulePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TimeScheduleUpsertExternalMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TimeScheduleUpsertExternalMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof TimeScheduleUpsertExternalMutationResponse);
		
		return $response;
	}
}
