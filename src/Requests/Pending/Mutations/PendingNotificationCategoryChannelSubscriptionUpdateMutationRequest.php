<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserSettingsPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\NotificationCategoryChannelSubscriptionUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingNotificationCategoryChannelSubscriptionUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['channel' => 'NotificationChannel!', 'category' => 'NotificationCategory!', 'subscribe' => 'Boolean!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'notificationCategoryChannelSubscriptionUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): UserSettingsPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): NotificationCategoryChannelSubscriptionUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(NotificationCategoryChannelSubscriptionUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof NotificationCategoryChannelSubscriptionUpdateMutationResponse);
		
		return $response;
	}
}
