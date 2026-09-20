<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AccessKeyRelease;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\RecentReleasesByAccessKeyQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingRecentReleasesByAccessKeyQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'name', 'createdAt', 'url', 'commitSha', 'version', 'completedAt', 'archivedAt'];

	protected const ARGUMENT_TYPES = ['limit' => 'Int'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'recentReleasesByAccessKey', $args, static::ARGUMENT_TYPES));
	}

	/** @returns Collection<int, AccessKeyRelease> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): RecentReleasesByAccessKeyQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(RecentReleasesByAccessKeyQueryResponse::class, $query))->throw();
		
		assert($response instanceof RecentReleasesByAccessKeyQueryResponse);
		
		return $response;
	}
}
