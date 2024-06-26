<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectUpdatePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ProjectUpdateCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectUpdateCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'projectUpdateCreate', $args));
	}
	
	public function get(string ...$fields): ProjectUpdatePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ProjectUpdateCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectUpdateCreateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof ProjectUpdateCreateMutationResponse);
		
		return $response;
	}
}
