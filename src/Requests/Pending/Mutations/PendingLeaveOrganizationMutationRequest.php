<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CreateOrJoinOrganizationResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\LeaveOrganizationMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingLeaveOrganizationMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [];

	protected const ARGUMENT_TYPES = ['organizationId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'leaveOrganization', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CreateOrJoinOrganizationResponse
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): LeaveOrganizationMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(LeaveOrganizationMutationResponse::class, $query))->throw();
		
		assert($response instanceof LeaveOrganizationMutationResponse);
		
		return $response;
	}
}
