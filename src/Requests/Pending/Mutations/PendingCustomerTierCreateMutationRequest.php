<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomerTierPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CustomerTierCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomerTierCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'CustomerTierCreateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'customerTierCreate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomerTierPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomerTierCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomerTierCreateMutationResponse::class, $query))->throw();
		
		assert($response instanceof CustomerTierCreateMutationResponse);
		
		return $response;
	}
}
