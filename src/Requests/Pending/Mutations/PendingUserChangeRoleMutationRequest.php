<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserAdminPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\UserChangeRoleMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserChangeRoleMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['role' => 'UserRoleType!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'userChangeRole', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): UserAdminPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): UserChangeRoleMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserChangeRoleMutationResponse::class, $query))->throw();
		
		assert($response instanceof UserChangeRoleMutationResponse);
		
		return $response;
	}
}
