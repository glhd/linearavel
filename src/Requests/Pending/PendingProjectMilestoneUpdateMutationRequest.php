<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectMilestonePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ProjectMilestoneUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectMilestoneUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'projectMilestoneUpdate', $args));
	}
	
	public function get(string ...$fields): ProjectMilestonePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ProjectMilestoneUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectMilestoneUpdateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof ProjectMilestoneUpdateMutationResponse);
		
		return $response;
	}
}
