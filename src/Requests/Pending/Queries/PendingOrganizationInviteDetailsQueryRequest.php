<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Contracts\OrganizationInviteDetailsPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\OrganizationInviteDetailsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationInviteDetailsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['__typename', 'on OrganizationInviteFullDetailsPayload.status', 'on OrganizationInviteFullDetailsPayload.inviter', 'on OrganizationInviteFullDetailsPayload.email', 'on OrganizationInviteFullDetailsPayload.role', 'on OrganizationInviteFullDetailsPayload.createdAt', 'on OrganizationInviteFullDetailsPayload.organizationName', 'on OrganizationInviteFullDetailsPayload.organizationId', 'on OrganizationInviteFullDetailsPayload.accepted', 'on OrganizationInviteFullDetailsPayload.expired', 'on OrganizationInviteFullDetailsPayload.organizationLogoUrl', 'on OrganizationAcceptedOrExpiredInviteDetailsPayload.status'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'organizationInviteDetails', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): OrganizationInviteDetailsPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OrganizationInviteDetailsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OrganizationInviteDetailsQueryResponse::class, $query))->throw();
		
		assert($response instanceof OrganizationInviteDetailsQueryResponse);
		
		return $response;
	}
}
