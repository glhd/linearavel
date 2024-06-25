<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\RoadmapConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\RoadmapsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingRoadmapsRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.slugId', 'nodes.sortOrder', 'nodes.archivedAt', 'nodes.description', 'nodes.color'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'roadmaps', $args));
	}
	
	public function get(string ...$fields): RoadmapConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): RoadmapsResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(RoadmapsResponse::class, (string) $query))->throw();
		
		assert($response instanceof RoadmapsResponse);
		
		return $response;
	}
}
