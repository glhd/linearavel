<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomerPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CustomerUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomerUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'CustomerUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'customerUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomerPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomerUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomerUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof CustomerUpdateMutationResponse);
		
		return $response;
	}
}
