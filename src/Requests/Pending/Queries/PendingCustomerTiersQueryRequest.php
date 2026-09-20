<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomerTierConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CustomerTiersQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomerTiersQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.color', 'nodes.position', 'nodes.displayName', 'nodes.archivedAt', 'nodes.description'];

	protected const ARGUMENT_TYPES = ['before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'customerTiers', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomerTierConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomerTiersQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomerTiersQueryResponse::class, $query))->throw();
		
		assert($response instanceof CustomerTiersQueryResponse);
		
		return $response;
	}
}
