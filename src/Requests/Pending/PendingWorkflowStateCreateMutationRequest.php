<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\WorkflowStatePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\WorkflowStateCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingWorkflowStateCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'workflowStateCreate', $args));
	}
	
	public function get(string ...$fields): WorkflowStatePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): WorkflowStateCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(WorkflowStateCreateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof WorkflowStateCreateMutationResponse);
		
		return $response;
	}
}
