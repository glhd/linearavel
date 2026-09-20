<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Release;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ReleaseQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReleaseQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'slugId', 'progressHistory', 'currentProgress', 'url', 'issueCount', 'archivedAt', 'description', 'version', 'commitSha', 'startDate', 'targetDate', 'startedAt', 'completedAt', 'canceledAt', 'autoArchivedAt', 'trashed'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'release', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): Release
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ReleaseQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReleaseQueryResponse::class, $query))->throw();
		
		assert($response instanceof ReleaseQueryResponse);
		
		return $response;
	}
}
