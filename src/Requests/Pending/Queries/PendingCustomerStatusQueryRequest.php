<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomerStatus;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CustomerStatusQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomerStatusQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'color', 'position', 'displayName', 'archivedAt', 'description', 'type'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'customerStatus', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomerStatus
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomerStatusQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomerStatusQueryResponse::class, $query))->throw();
		
		assert($response instanceof CustomerStatusQueryResponse);
		
		return $response;
	}
}
