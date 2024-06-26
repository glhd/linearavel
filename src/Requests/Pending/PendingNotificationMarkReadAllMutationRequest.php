<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\NotificationBatchActionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\NotificationMarkReadAllMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingNotificationMarkReadAllMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'notifications', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'notificationMarkReadAll', $args));
	}
	
	public function get(string ...$fields): NotificationBatchActionPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): NotificationMarkReadAllMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(NotificationMarkReadAllMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof NotificationMarkReadAllMutationResponse);
		
		return $response;
	}
}
