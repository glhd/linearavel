<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationInviteConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\OrganizationInvitesResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationInvitesRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'organizationInvites', $args));
	}
	
	public function get(string ...$fields): OrganizationInviteConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): OrganizationInvitesResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(OrganizationInvitesResponse::class, (string) $query))->throw();
		
		assert($response instanceof OrganizationInvitesResponse);
		
		return $response;
	}
}
