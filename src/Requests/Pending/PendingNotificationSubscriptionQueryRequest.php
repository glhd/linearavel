<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Contracts\NotificationSubscription;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\NotificationSubscriptionQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingNotificationSubscriptionQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'notificationSubscription', $args));
	}
	
	public function get(string ...$fields): NotificationSubscription
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): NotificationSubscriptionQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(NotificationSubscriptionQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof NotificationSubscriptionQueryResponse);
		
		return $response;
	}
}
