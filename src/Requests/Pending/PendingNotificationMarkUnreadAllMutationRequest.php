<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\NotificationBatchActionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\NotificationMarkUnreadAllMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingNotificationMarkUnreadAllMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'notifications', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'notificationMarkUnreadAll', $args));
	}
	
	public function get(string ...$fields): NotificationBatchActionPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): NotificationMarkUnreadAllMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(NotificationMarkUnreadAllMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof NotificationMarkUnreadAllMutationResponse);
		
		return $response;
	}
}
