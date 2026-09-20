<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomerTier;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CustomerTierQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomerTierQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'color', 'position', 'displayName', 'archivedAt', 'description'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'customerTier', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomerTier
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomerTierQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomerTierQueryResponse::class, $query))->throw();
		
		assert($response instanceof CustomerTierQueryResponse);
		
		return $response;
	}
}
