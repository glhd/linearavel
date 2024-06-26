<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\RoadmapToProjectPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\RoadmapToProjectUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingRoadmapToProjectUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'roadmapToProjectUpdate', $args));
	}
	
	public function get(string ...$fields): RoadmapToProjectPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): RoadmapToProjectUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(RoadmapToProjectUpdateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof RoadmapToProjectUpdateMutationResponse);
		
		return $response;
	}
}
