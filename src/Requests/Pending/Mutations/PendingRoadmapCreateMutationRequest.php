<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\RoadmapPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\RoadmapCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingRoadmapCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'RoadmapCreateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'roadmapCreate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): RoadmapPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): RoadmapCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(RoadmapCreateMutationResponse::class, $query))->throw();
		
		assert($response instanceof RoadmapCreateMutationResponse);
		
		return $response;
	}
}
