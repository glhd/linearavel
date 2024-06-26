<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\NotificationSubscriptionConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\NotificationSubscriptionsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingNotificationSubscriptionsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'notificationSubscriptions', $args));
	}
	
	public function get(string ...$fields): NotificationSubscriptionConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): NotificationSubscriptionsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(NotificationSubscriptionsQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof NotificationSubscriptionsQueryResponse);
		
		return $response;
	}
}
