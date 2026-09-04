<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\InitiativeCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'InitiativeCreateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'initiativeCreate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): InitiativePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): InitiativeCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeCreateMutationResponse::class, $query))->throw();
		
		assert($response instanceof InitiativeCreateMutationResponse);
		
		return $response;
	}
}
