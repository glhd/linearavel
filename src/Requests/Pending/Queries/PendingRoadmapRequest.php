<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Roadmap;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\RoadmapResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingRoadmapRequest extends PendingLinearRequest
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
	
	public function response(string ...$fields): RoadmapResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(RoadmapResponse::class, (string) $query))->throw();
		
		assert($response instanceof RoadmapResponse);
		
		return $response;
	}
}
