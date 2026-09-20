<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\NotificationsUnreadCountQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingNotificationsUnreadCountQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [];

	protected const ARGUMENT_TYPES = [];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'notificationsUnreadCount', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): int
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): NotificationsUnreadCountQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(NotificationsUnreadCountQueryResponse::class, $query))->throw();
		
		assert($response instanceof NotificationsUnreadCountQueryResponse);
		
		return $response;
	}
}
