<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationInvite;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\OrganizationInviteQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationInviteQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'email', 'role', 'external', 'metadata', 'archivedAt', 'acceptedAt', 'expiresAt'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'organizationInvite', $args));
	}
	
	public function get(string ...$fields): OrganizationInvite
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): OrganizationInviteQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OrganizationInviteQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof OrganizationInviteQueryResponse);
		
		return $response;
	}
}
