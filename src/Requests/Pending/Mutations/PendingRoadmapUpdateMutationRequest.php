<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\RoadmapPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\RoadmapUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingRoadmapUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'RoadmapUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'roadmapUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): RoadmapPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): RoadmapUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(RoadmapUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof RoadmapUpdateMutationResponse);
		
		return $response;
	}
}
