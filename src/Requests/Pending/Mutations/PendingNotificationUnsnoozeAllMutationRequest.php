<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\NotificationBatchActionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\NotificationUnsnoozeAllMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingNotificationUnsnoozeAllMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'notifications', 'success'];

	protected const ARGUMENT_TYPES = ['unsnoozedAt' => 'DateTime!', 'input' => 'NotificationEntityInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'notificationUnsnoozeAll', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): NotificationBatchActionPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): NotificationUnsnoozeAllMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(NotificationUnsnoozeAllMutationResponse::class, $query))->throw();
		
		assert($response instanceof NotificationUnsnoozeAllMutationResponse);
		
		return $response;
	}
}
