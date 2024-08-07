<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\WorkflowState;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\WorkflowStateQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingWorkflowStateQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'color', 'position', 'type', 'archivedAt', 'description'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'workflowState', $args));
	}
	
	public function get(string ...$fields): WorkflowState
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): WorkflowStateQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(WorkflowStateQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof WorkflowStateQueryResponse);
		
		return $response;
	}
}
