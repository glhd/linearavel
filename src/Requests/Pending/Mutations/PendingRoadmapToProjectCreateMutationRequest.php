<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\RoadmapToProjectPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\RoadmapToProjectCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingRoadmapToProjectCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'RoadmapToProjectCreateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'roadmapToProjectCreate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): RoadmapToProjectPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): RoadmapToProjectCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(RoadmapToProjectCreateMutationResponse::class, $query))->throw();
		
		assert($response instanceof RoadmapToProjectCreateMutationResponse);
		
		return $response;
	}
}
