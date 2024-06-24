<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\WorkflowStateConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\WorkflowStatesResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingWorkflowStatesRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'workflowStates', $args));
	}
	
	public function get(string ...$fields): WorkflowStateConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): WorkflowStatesResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(WorkflowStatesResponse::class, (string) $query))->throw();
		
		assert($response instanceof WorkflowStatesResponse);
		
		return $response;
	}
}
