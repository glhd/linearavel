<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ReleaseStage;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ReleaseStageQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReleaseStageQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'color', 'type', 'position', 'frozen', 'archivedAt'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'releaseStage', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ReleaseStage
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ReleaseStageQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReleaseStageQueryResponse::class, $query))->throw();
		
		assert($response instanceof ReleaseStageQueryResponse);
		
		return $response;
	}
}
