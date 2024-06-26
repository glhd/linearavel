<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\PushSubscriptionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\PushSubscriptionDeleteMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingPushSubscriptionDeleteMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'pushSubscriptionDelete', $args));
	}
	
	public function get(string ...$fields): PushSubscriptionPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): PushSubscriptionDeleteMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(PushSubscriptionDeleteMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof PushSubscriptionDeleteMutationResponse);
		
		return $response;
	}
}
