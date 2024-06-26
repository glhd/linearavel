<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserSettingsFlagPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\UserSettingsFlagIncrementMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserSettingsFlagIncrementMutationRequest extends PendingLinearRequest
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
	
	public function response(string ...$fields): UserSettingsFlagIncrementMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserSettingsFlagIncrementMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof UserSettingsFlagIncrementMutationResponse);
		
		return $response;
	}
}
