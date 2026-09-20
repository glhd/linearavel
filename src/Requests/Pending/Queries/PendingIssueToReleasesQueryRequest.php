<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueToReleaseConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueToReleasesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueToReleasesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.archivedAt'];

	protected const ARGUMENT_TYPES = ['before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueToReleases', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueToReleaseConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueToReleasesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueToReleasesQueryResponse::class, $query))->throw();
		
		assert($response instanceof IssueToReleasesQueryResponse);
		
		return $response;
	}
}
