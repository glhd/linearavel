<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AccessKeyRelease;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\LatestReleaseByAccessKeyQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingLatestReleaseByAccessKeyQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'name', 'createdAt', 'url', 'commitSha', 'version', 'completedAt', 'archivedAt'];

	protected const ARGUMENT_TYPES = [];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'latestReleaseByAccessKey', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ?AccessKeyRelease
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): LatestReleaseByAccessKeyQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(LatestReleaseByAccessKeyQueryResponse::class, $query))->throw();
		
		assert($response instanceof LatestReleaseByAccessKeyQueryResponse);
		
		return $response;
	}
}
