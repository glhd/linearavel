<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectUpdateInteractionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ProjectUpdateInteractionCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectUpdateInteractionCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'projectUpdateInteractionCreate', $args));
	}
	
	public function get(string ...$fields): ProjectUpdateInteractionPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ProjectUpdateInteractionCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectUpdateInteractionCreateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof ProjectUpdateInteractionCreateMutationResponse);
		
		return $response;
	}
}
