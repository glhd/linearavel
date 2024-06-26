<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Contracts\Notification;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\NotificationQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingNotificationQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'notification', $args));
	}
	
	public function get(string ...$fields): Notification
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): NotificationQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(NotificationQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof NotificationQueryResponse);
		
		return $response;
	}
}
