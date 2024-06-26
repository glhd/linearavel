<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativeToProject;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\InitiativeToProjectQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeToProjectQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'sortOrder', 'archivedAt'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'initiativeToProject', $args));
	}
	
	public function get(string ...$fields): InitiativeToProject
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): InitiativeToProjectQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeToProjectQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof InitiativeToProjectQueryResponse);
		
		return $response;
	}
}
