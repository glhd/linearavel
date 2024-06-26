<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ProjectCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'projectCreate', $args));
	}
	
	public function get(string ...$fields): ProjectPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ProjectCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectCreateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof ProjectCreateMutationResponse);
		
		return $response;
	}
}
