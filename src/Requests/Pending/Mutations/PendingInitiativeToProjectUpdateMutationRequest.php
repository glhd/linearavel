<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativeToProjectPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\InitiativeToProjectUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeToProjectUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'InitiativeToProjectUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'initiativeToProjectUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): InitiativeToProjectPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): InitiativeToProjectUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeToProjectUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof InitiativeToProjectUpdateMutationResponse);
		
		return $response;
	}
}
