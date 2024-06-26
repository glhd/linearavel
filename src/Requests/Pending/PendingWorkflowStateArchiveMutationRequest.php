<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\WorkflowStateArchivePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\WorkflowStateArchiveMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingWorkflowStateArchiveMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'workflowStateArchive', $args));
	}
	
	public function get(string ...$fields): WorkflowStateArchivePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): WorkflowStateArchiveMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(WorkflowStateArchiveMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof WorkflowStateArchiveMutationResponse);
		
		return $response;
	}
}
