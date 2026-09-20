<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomerTierPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CustomerTierUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomerTierUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'CustomerTierUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'customerTierUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomerTierPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomerTierUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomerTierUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof CustomerTierUpdateMutationResponse);
		
		return $response;
	}
}
