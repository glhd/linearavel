<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativeToProjectPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\InitiativeToProjectUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeToProjectUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'initiativeToProjectUpdate', $args));
	}
	
	public function get(string ...$fields): InitiativeToProjectPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): InitiativeToProjectUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeToProjectUpdateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof InitiativeToProjectUpdateMutationResponse);
		
		return $response;
	}
}
