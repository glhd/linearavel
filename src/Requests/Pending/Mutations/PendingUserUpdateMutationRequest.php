<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\UserUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'UserUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'userUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): UserPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): UserUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof UserUpdateMutationResponse);
		
		return $response;
	}
}
