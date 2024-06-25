<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserSettingsFlagsResetPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\UserSettingsFlagsResetResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserSettingsFlagsResetRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'userSettingsFlagsReset', $args));
	}
	
	public function get(string ...$fields): UserSettingsFlagsResetPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): UserSettingsFlagsResetResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserSettingsFlagsResetResponse::class, (string) $query))->throw();
		
		assert($response instanceof UserSettingsFlagsResetResponse);
		
		return $response;
	}
}
