<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UserAdminPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\UserDemoteMemberMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUserDemoteMemberMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'userDemoteMember', $args));
	}
	
	public function get(string ...$fields): UserAdminPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): UserDemoteMemberMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UserDemoteMemberMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof UserDemoteMemberMutationResponse);
		
		return $response;
	}
}
