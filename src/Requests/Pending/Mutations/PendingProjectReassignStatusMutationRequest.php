<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\SuccessPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ProjectReassignStatusMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectReassignStatusMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['newProjectStatusId' => 'String!', 'originalProjectStatusId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'projectReassignStatus', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): SuccessPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ProjectReassignStatusMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectReassignStatusMutationResponse::class, $query))->throw();
		
		assert($response instanceof ProjectReassignStatusMutationResponse);
		
		return $response;
	}
}
