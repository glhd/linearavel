<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueRelationConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueRelationsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueRelationsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.type', 'nodes.archivedAt'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueRelations', $args));
	}
	
	public function get(string ...$fields): IssueRelationConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssueRelationsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueRelationsQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueRelationsQueryResponse);
		
		return $response;
	}
}
