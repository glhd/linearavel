<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomViewPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CustomViewUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomViewUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'CustomViewUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'customViewUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomViewPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomViewUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomViewUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof CustomViewUpdateMutationResponse);
		
		return $response;
	}
}
