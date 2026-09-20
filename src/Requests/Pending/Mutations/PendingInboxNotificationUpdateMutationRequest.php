<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InboxNotificationUpdatePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\InboxNotificationUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInboxNotificationUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'notification', 'updatedNotifications', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'InboxNotificationUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'inboxNotificationUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): InboxNotificationUpdatePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): InboxNotificationUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InboxNotificationUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof InboxNotificationUpdateMutationResponse);
		
		return $response;
	}
}
