<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\RoadmapArchivePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\RoadmapArchiveResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingRoadmapArchiveRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'roadmapArchive', $args));
	}
	
	public function get(string ...$fields): RoadmapArchivePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): RoadmapArchiveResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(RoadmapArchiveResponse::class, (string) $query))->throw();
		
		assert($response instanceof RoadmapArchiveResponse);
		
		return $response;
	}
}
