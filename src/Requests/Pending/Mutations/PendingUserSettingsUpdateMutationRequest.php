<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserSettingsPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\UserSettingsUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserSettingsUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'UserSettingsUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'userSettingsUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): UserSettingsPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): UserSettingsUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserSettingsUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof UserSettingsUpdateMutationResponse);
		
		return $response;
	}
}
