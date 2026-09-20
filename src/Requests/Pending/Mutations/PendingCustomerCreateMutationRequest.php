<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomerPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CustomerCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomerCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'CustomerCreateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'customerCreate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomerPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomerCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomerCreateMutationResponse::class, $query))->throw();
		
		assert($response instanceof CustomerCreateMutationResponse);
		
		return $response;
	}
}
