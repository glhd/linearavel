<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectUpdateInteractionConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectUpdateInteractionsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectUpdateInteractionsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.readAt', 'nodes.archivedAt'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'projectUpdateInteractions', $args));
	}
	
	public function get(string ...$fields): ProjectUpdateInteractionConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ProjectUpdateInteractionsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectUpdateInteractionsQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof ProjectUpdateInteractionsQueryResponse);
		
		return $response;
	}
}
