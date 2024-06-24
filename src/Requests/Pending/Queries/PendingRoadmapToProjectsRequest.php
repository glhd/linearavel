<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\RoadmapToProjectConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\RoadmapToProjectsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingRoadmapToProjectsRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'roadmapToProjects', $args));
	}
	
	public function get(string ...$fields): RoadmapToProjectConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): RoadmapToProjectsResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(RoadmapToProjectsResponse::class, (string) $query))->throw();
		
		assert($response instanceof RoadmapToProjectsResponse);
		
		return $response;
	}
}