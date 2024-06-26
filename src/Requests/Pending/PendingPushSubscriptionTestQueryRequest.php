<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\PushSubscriptionTestPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\PushSubscriptionTestQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingPushSubscriptionTestQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'pushSubscriptionTest', $args));
	}
	
	public function get(string ...$fields): PushSubscriptionTestPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): PushSubscriptionTestQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(PushSubscriptionTestQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof PushSubscriptionTestQueryResponse);
		
		return $response;
	}
}
