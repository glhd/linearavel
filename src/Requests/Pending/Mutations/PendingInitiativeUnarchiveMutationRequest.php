<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativeArchivePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\InitiativeUnarchiveMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeUnarchiveMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'initiativeUnarchive', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): InitiativeArchivePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): InitiativeUnarchiveMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeUnarchiveMutationResponse::class, $query))->throw();
		
		assert($response instanceof InitiativeUnarchiveMutationResponse);
		
		return $response;
	}
}
