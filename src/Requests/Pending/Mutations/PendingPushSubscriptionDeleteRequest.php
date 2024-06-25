<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\PushSubscriptionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\PushSubscriptionDeleteResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingPushSubscriptionDeleteRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'pushSubscriptionDelete', $args));
	}
	
	public function get(string ...$fields): PushSubscriptionPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): PushSubscriptionDeleteResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(PushSubscriptionDeleteResponse::class, (string) $query))->throw();
		
		assert($response instanceof PushSubscriptionDeleteResponse);
		
		return $response;
	}
}
