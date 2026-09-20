<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\RoadmapArchivePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\RoadmapArchiveMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingRoadmapArchiveMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'roadmapArchive', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): RoadmapArchivePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): RoadmapArchiveMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(RoadmapArchiveMutationResponse::class, $query))->throw();
		
		assert($response instanceof RoadmapArchiveMutationResponse);
		
		return $response;
	}
}
