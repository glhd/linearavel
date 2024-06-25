<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\NotificationSubscriptionConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\NotificationSubscriptionsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingNotificationSubscriptionsRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['nodes'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'notificationSubscriptions', $args));
	}
	
	public function get(string ...$fields): NotificationSubscriptionConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): NotificationSubscriptionsResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(NotificationSubscriptionsResponse::class, (string) $query))->throw();
		
		assert($response instanceof NotificationSubscriptionsResponse);
		
		return $response;
	}
}
