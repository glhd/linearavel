<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserSettingsFlagPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\UserFlagUpdateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserFlagUpdateRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['lastSyncId', 'flag', 'value', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'userFlagUpdate', $args));
	}
	
	public function get(string ...$fields): UserSettingsFlagPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): UserFlagUpdateResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserFlagUpdateResponse::class, (string) $query))->throw();
		
		assert($response instanceof UserFlagUpdateResponse);
		
		return $response;
	}
}
