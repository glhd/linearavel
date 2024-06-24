<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Contracts\Notification;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\NotificationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingNotificationRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'notification', $args));
	}
	
	public function get(string ...$fields): Notification
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): NotificationResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(NotificationResponse::class, (string) $query))->throw();
		
		assert($response instanceof NotificationResponse);
		
		return $response;
	}
}
