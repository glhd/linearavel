<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\PushSubscriptionTestPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\PushSubscriptionTestQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingPushSubscriptionTestQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['targetMobile' => 'Boolean', 'sendStrategy' => 'SendStrategy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'pushSubscriptionTest', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): PushSubscriptionTestPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): PushSubscriptionTestQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(PushSubscriptionTestQueryResponse::class, $query))->throw();
		
		assert($response instanceof PushSubscriptionTestQueryResponse);
		
		return $response;
	}
}
