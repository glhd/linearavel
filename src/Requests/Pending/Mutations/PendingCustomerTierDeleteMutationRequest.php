<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DeletePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CustomerTierDeleteMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomerTierDeleteMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'entityId'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'customerTierDelete', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): DeletePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomerTierDeleteMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomerTierDeleteMutationResponse::class, $query))->throw();
		
		assert($response instanceof CustomerTierDeleteMutationResponse);
		
		return $response;
	}
}
