<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\NotificationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\NotificationUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingNotificationUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'notification', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'notificationUpdate', $args));
	}
	
	public function get(string ...$fields): NotificationPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): NotificationUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(NotificationUpdateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof NotificationUpdateMutationResponse);
		
		return $response;
	}
}
