<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserSettings;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\UserSettingsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserSettingsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'id',
		'createdAt',
		'updatedAt',
		'notificationPreferences',
		'unsubscribedFrom',
		'subscribedToChangelog',
		'subscribedToDPA',
		'subscribedToInviteAccepted',
		'subscribedToPrivacyLegalUpdates',
		'subscribedToUnreadNotificationsReminder',
		'showFullUserNames',
		'archivedAt',
		'calendarHash',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'userSettings', $args));
	}
	
	public function get(string ...$fields): UserSettings
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): UserSettingsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserSettingsQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof UserSettingsQueryResponse);
		
		return $response;
	}
}
