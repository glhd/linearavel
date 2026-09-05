<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CyclePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CycleUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCycleUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'CycleUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'cycleUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CyclePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CycleUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CycleUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof CycleUpdateMutationResponse);
		
		return $response;
	}
}
