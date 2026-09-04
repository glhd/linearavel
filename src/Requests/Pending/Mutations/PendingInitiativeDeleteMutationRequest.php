<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DeletePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\InitiativeDeleteMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeDeleteMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'entityId'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'initiativeDelete', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): DeletePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): InitiativeDeleteMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeDeleteMutationResponse::class, $query))->throw();
		
		assert($response instanceof InitiativeDeleteMutationResponse);
		
		return $response;
	}
}
