<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomerStatusPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CustomerStatusUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomerStatusUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'CustomerStatusUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'customerStatusUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomerStatusPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomerStatusUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomerStatusUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof CustomerStatusUpdateMutationResponse);
		
		return $response;
	}
}
