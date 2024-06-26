<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\NotificationConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\NotificationsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingNotificationsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'notifications', $args));
	}
	
	public function get(string ...$fields): NotificationConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): NotificationsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(NotificationsQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof NotificationsQueryResponse);
		
		return $response;
	}
}
