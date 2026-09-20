<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomerStatusConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CustomerStatusesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomerStatusesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.color', 'nodes.position', 'nodes.displayName', 'nodes.archivedAt', 'nodes.description', 'nodes.type'];

	protected const ARGUMENT_TYPES = ['before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'customerStatuses', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomerStatusConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomerStatusesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomerStatusesQueryResponse::class, $query))->throw();
		
		assert($response instanceof CustomerStatusesQueryResponse);
		
		return $response;
	}
}
