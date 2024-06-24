<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\PushSubscriptionTestPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\PushSubscriptionTestResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingPushSubscriptionTestRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'pushSubscriptionTest', $args));
	}
	
	public function get(string ...$fields): PushSubscriptionTestPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): PushSubscriptionTestResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(PushSubscriptionTestResponse::class, (string) $query))->throw();
		
		assert($response instanceof PushSubscriptionTestResponse);
		
		return $response;
	}
}
