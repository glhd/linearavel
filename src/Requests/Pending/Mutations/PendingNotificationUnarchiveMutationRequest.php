<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\NotificationArchivePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\NotificationUnarchiveMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingNotificationUnarchiveMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'entity'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'notificationUnarchive', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): NotificationArchivePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): NotificationUnarchiveMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(NotificationUnarchiveMutationResponse::class, $query))->throw();
		
		assert($response instanceof NotificationUnarchiveMutationResponse);
		
		return $response;
	}
}
