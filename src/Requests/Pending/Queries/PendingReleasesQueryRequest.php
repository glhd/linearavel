<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ReleaseConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ReleasesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReleasesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.slugId', 'nodes.progressHistory', 'nodes.currentProgress', 'nodes.url', 'nodes.issueCount', 'nodes.archivedAt', 'nodes.description', 'nodes.version', 'nodes.commitSha', 'nodes.startDate', 'nodes.targetDate', 'nodes.startedAt', 'nodes.completedAt', 'nodes.canceledAt', 'nodes.autoArchivedAt', 'nodes.trashed'];

	protected const ARGUMENT_TYPES = ['filter' => 'ReleaseFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy', 'sort' => '[ReleaseSortInput!]'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'releases', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ReleaseConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ReleasesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReleasesQueryResponse::class, $query))->throw();
		
		assert($response instanceof ReleasesQueryResponse);
		
		return $response;
	}
}
