<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\InitiativeUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'initiativeUpdate', $args));
	}
	
	public function get(string ...$fields): InitiativePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): InitiativeUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeUpdateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof InitiativeUpdateMutationResponse);
		
		return $response;
	}
}
