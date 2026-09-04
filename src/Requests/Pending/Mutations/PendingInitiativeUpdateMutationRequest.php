<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\InitiativeUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'InitiativeUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'initiativeUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): InitiativePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): InitiativeUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof InitiativeUpdateMutationResponse);
		
		return $response;
	}
}
