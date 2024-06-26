<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\RoadmapToProject;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\RoadmapToProjectQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingRoadmapToProjectQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'sortOrder', 'archivedAt'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'roadmapToProject', $args));
	}
	
	public function get(string ...$fields): RoadmapToProject
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): RoadmapToProjectQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(RoadmapToProjectQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof RoadmapToProjectQueryResponse);
		
		return $response;
	}
}
