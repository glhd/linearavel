<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\NotificationArchivePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\NotificationArchiveMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingNotificationArchiveMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'entity'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'notificationArchive', $args));
	}
	
	public function get(string ...$fields): NotificationArchivePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): NotificationArchiveMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(NotificationArchiveMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof NotificationArchiveMutationResponse);
		
		return $response;
	}
}
