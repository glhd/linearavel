<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Roadmap;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\RoadmapQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingRoadmapQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'slugId', 'sortOrder', 'archivedAt', 'description', 'color'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'roadmap', $args));
	}
	
	public function get(string ...$fields): Roadmap
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): RoadmapQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(RoadmapQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof RoadmapQueryResponse);
		
		return $response;
	}
}
