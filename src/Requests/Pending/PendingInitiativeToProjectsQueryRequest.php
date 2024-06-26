<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativeToProjectConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\InitiativeToProjectsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeToProjectsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.sortOrder', 'nodes.archivedAt'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'initiativeToProjects', $args));
	}
	
	public function get(string ...$fields): InitiativeToProjectConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): InitiativeToProjectsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeToProjectsQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof InitiativeToProjectsQueryResponse);
		
		return $response;
	}
}
