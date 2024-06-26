<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\WorkflowStateConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\WorkflowStatesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingWorkflowStatesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.color', 'nodes.position', 'nodes.type', 'nodes.archivedAt', 'nodes.description'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'workflowStates', $args));
	}
	
	public function get(string ...$fields): WorkflowStateConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): WorkflowStatesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(WorkflowStatesQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof WorkflowStatesQueryResponse);
		
		return $response;
	}
}
