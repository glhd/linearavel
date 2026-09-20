<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\InitiativeAddLabelMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeAddLabelMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['labelId' => 'String!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'initiativeAddLabel', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): InitiativePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): InitiativeAddLabelMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeAddLabelMutationResponse::class, $query))->throw();
		
		assert($response instanceof InitiativeAddLabelMutationResponse);
		
		return $response;
	}
}
