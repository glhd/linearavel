<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueToRelease;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueToReleaseQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueToReleaseQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'archivedAt'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueToRelease', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueToRelease
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueToReleaseQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueToReleaseQueryResponse::class, $query))->throw();
		
		assert($response instanceof IssueToReleaseQueryResponse);
		
		return $response;
	}
}
