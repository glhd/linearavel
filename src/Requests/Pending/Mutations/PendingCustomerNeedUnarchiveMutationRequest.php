<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomerNeedArchivePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CustomerNeedUnarchiveMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomerNeedUnarchiveMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'customerNeedUnarchive', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomerNeedArchivePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomerNeedUnarchiveMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomerNeedUnarchiveMutationResponse::class, $query))->throw();
		
		assert($response instanceof CustomerNeedUnarchiveMutationResponse);
		
		return $response;
	}
}
