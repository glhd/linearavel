<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\RoadmapToProjectConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\RoadmapToProjectsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingRoadmapToProjectsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.sortOrder', 'nodes.archivedAt'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'roadmapToProjects', $args));
	}
	
	public function get(string ...$fields): RoadmapToProjectConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): RoadmapToProjectsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(RoadmapToProjectsQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof RoadmapToProjectsQueryResponse);
		
		return $response;
	}
}
