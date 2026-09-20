<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\NotificationSubscriptionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\NotificationSubscriptionCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingNotificationSubscriptionCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'notificationSubscription', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'NotificationSubscriptionCreateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'notificationSubscriptionCreate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): NotificationSubscriptionPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): NotificationSubscriptionCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(NotificationSubscriptionCreateMutationResponse::class, $query))->throw();
		
		assert($response instanceof NotificationSubscriptionCreateMutationResponse);
		
		return $response;
	}
}
