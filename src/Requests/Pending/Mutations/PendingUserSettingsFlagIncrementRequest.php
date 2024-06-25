<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserSettingsFlagPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\UserSettingsFlagIncrementResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserSettingsFlagIncrementRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'flag', 'value', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'userSettingsFlagIncrement', $args));
	}
	
	public function get(string ...$fields): UserSettingsFlagPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): UserSettingsFlagIncrementResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserSettingsFlagIncrementResponse::class, (string) $query))->throw();
		
		assert($response instanceof UserSettingsFlagIncrementResponse);
		
		return $response;
	}
}
