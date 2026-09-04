<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserAdminPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\UserPromoteAdminMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserPromoteAdminMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'userPromoteAdmin', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): UserAdminPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): UserPromoteAdminMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserPromoteAdminMutationResponse::class, $query))->throw();
		
		assert($response instanceof UserPromoteAdminMutationResponse);
		
		return $response;
	}
}
