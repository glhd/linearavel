<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectUpdateInteraction;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectUpdateInteractionQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectUpdateInteractionQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'readAt', 'archivedAt'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'projectUpdateInteraction', $args));
	}
	
	public function get(string ...$fields): ProjectUpdateInteraction
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ProjectUpdateInteractionQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectUpdateInteractionQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof ProjectUpdateInteractionQueryResponse);
		
		return $response;
	}
}
