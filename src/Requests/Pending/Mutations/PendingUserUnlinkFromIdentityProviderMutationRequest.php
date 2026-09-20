<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserAdminPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\UserUnlinkFromIdentityProviderMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserUnlinkFromIdentityProviderMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'userUnlinkFromIdentityProvider', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): UserAdminPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): UserUnlinkFromIdentityProviderMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserUnlinkFromIdentityProviderMutationResponse::class, $query))->throw();
		
		assert($response instanceof UserUnlinkFromIdentityProviderMutationResponse);
		
		return $response;
	}
}
