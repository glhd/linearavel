<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\PushSubscriptionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\PushSubscriptionCreateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingPushSubscriptionCreateRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'pushSubscriptionCreate', $args));
	}
	
	public function get(string ...$fields): PushSubscriptionPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): PushSubscriptionCreateResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(PushSubscriptionCreateResponse::class, (string) $query))->throw();
		
		assert($response instanceof PushSubscriptionCreateResponse);
		
		return $response;
	}
}
