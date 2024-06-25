<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserSettings;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\UserSettingsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserSettingsRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = [
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
	
	public function response(string ...$fields): UserSettingsResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserSettingsResponse::class, (string) $query))->throw();
		
		assert($response instanceof UserSettingsResponse);
		
		return $response;
	}
}
