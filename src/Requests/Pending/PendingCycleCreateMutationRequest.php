<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CyclePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CycleCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCycleCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'cycleCreate', $args));
	}
	
	public function get(string ...$fields): CyclePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CycleCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CycleCreateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof CycleCreateMutationResponse);
		
		return $response;
	}
}
