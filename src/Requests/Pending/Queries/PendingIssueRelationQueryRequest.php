<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueRelation;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueRelationQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueRelationQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'type', 'archivedAt'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueRelation', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueRelation
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueRelationQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueRelationQueryResponse::class, $query))->throw();
		
		assert($response instanceof IssueRelationQueryResponse);
		
		return $response;
	}
}
