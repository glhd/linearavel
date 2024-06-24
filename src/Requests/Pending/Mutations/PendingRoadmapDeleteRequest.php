<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DeletePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\RoadmapDeleteResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingRoadmapDeleteRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'roadmapDelete', $args));
	}
	
	public function get(string ...$fields): DeletePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): RoadmapDeleteResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(RoadmapDeleteResponse::class, (string) $query))->throw();
		
		assert($response instanceof RoadmapDeleteResponse);
		
		return $response;
	}
}