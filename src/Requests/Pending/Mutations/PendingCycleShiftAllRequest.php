<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CyclePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CycleShiftAllResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCycleShiftAllRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'cycleShiftAll', $args));
	}
	
	public function get(string ...$fields): CyclePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CycleShiftAllResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CycleShiftAllResponse::class, (string) $query))->throw();
		
		assert($response instanceof CycleShiftAllResponse);
		
		return $response;
	}
}
