<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationInvitePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OrganizationInviteUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationInviteUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'OrganizationInviteUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'organizationInviteUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): OrganizationInvitePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OrganizationInviteUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OrganizationInviteUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof OrganizationInviteUpdateMutationResponse);
		
		return $response;
	}
}
