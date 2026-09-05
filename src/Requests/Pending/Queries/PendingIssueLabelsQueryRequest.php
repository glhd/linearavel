<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueLabelConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueLabelsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueLabelsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.color', 'nodes.isGroup', 'nodes.archivedAt', 'nodes.description'];

	protected const ARGUMENT_TYPES = ['filter' => 'IssueLabelFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueLabels', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueLabelConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueLabelsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueLabelsQueryResponse::class, $query))->throw();
		
		assert($response instanceof IssueLabelsQueryResponse);
		
		return $response;
	}
}
