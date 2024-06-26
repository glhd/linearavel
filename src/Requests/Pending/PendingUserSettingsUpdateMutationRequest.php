<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserSettingsPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\UserSettingsUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserSettingsUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'userSettingsUpdate', $args));
	}
	
	public function get(string ...$fields): UserSettingsPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): UserSettingsUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserSettingsUpdateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof UserSettingsUpdateMutationResponse);
		
		return $response;
	}
}
