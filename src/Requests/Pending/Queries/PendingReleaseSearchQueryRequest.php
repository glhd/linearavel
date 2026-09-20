<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Release;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ReleaseSearchQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingReleaseSearchQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'slugId', 'progressHistory', 'currentProgress', 'url', 'issueCount', 'archivedAt', 'description', 'version', 'commitSha', 'startDate', 'targetDate', 'startedAt', 'completedAt', 'canceledAt', 'autoArchivedAt', 'trashed'];

	protected const ARGUMENT_TYPES = ['filter' => 'ReleaseFilter', 'first' => 'Int', 'term' => 'String'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'releaseSearch', $args, static::ARGUMENT_TYPES));
	}

	/** @returns Collection<int, Release> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ReleaseSearchQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReleaseSearchQueryResponse::class, $query))->throw();
		
		assert($response instanceof ReleaseSearchQueryResponse);
		
		return $response;
	}
}
