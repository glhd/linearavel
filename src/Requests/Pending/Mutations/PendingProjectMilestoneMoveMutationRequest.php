<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectMilestoneMovePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ProjectMilestoneMoveMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectMilestoneMoveMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'ProjectMilestoneMoveInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'projectMilestoneMove', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ProjectMilestoneMovePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ProjectMilestoneMoveMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectMilestoneMoveMutationResponse::class, $query))->throw();
		
		assert($response instanceof ProjectMilestoneMoveMutationResponse);
		
		return $response;
	}
}
