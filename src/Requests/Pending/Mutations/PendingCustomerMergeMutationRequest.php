<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomerPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CustomerMergeMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomerMergeMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['sourceCustomerId' => 'String!', 'targetCustomerId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'customerMerge', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomerPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomerMergeMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomerMergeMutationResponse::class, $query))->throw();
		
		assert($response instanceof CustomerMergeMutationResponse);
		
		return $response;
	}
}
