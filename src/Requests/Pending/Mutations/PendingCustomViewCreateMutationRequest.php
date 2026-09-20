<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomViewPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CustomViewCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomViewCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'CustomViewCreateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'customViewCreate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomViewPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomViewCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomViewCreateMutationResponse::class, $query))->throw();
		
		assert($response instanceof CustomViewCreateMutationResponse);
		
		return $response;
	}
}
