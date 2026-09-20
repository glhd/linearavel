<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomerNeedConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CustomerNeedsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomerNeedsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.priority', 'nodes.archivedAt', 'nodes.body', 'nodes.bodyData', 'nodes.url', 'nodes.content'];

	protected const ARGUMENT_TYPES = ['filter' => 'CustomerNeedFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'customerNeeds', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomerNeedConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomerNeedsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomerNeedsQueryResponse::class, $query))->throw();
		
		assert($response instanceof CustomerNeedsQueryResponse);
		
		return $response;
	}
}
