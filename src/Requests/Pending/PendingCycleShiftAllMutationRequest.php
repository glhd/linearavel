<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CyclePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CycleShiftAllMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCycleShiftAllMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'cycleShiftAll', $args));
	}
	
	public function get(string ...$fields): CyclePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CycleShiftAllMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CycleShiftAllMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof CycleShiftAllMutationResponse);
		
		return $response;
	}
}