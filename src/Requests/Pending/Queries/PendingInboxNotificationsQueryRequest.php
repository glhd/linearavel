<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\NotificationConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\InboxNotificationsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInboxNotificationsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes'];

	protected const ARGUMENT_TYPES = ['first' => 'Int', 'after' => 'String', 'unreadOnly' => 'Boolean'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'inboxNotifications', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): NotificationConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): InboxNotificationsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InboxNotificationsQueryResponse::class, $query))->throw();
		
		assert($response instanceof InboxNotificationsQueryResponse);
		
		return $response;
	}
}
