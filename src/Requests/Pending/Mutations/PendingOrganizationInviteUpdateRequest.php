<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationInvitePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OrganizationInviteUpdateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationInviteUpdateRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'organizationInviteUpdate', $args));
	}
	
	public function get(string ...$fields): OrganizationInvitePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): OrganizationInviteUpdateResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(OrganizationInviteUpdateResponse::class, (string) $query))->throw();
		
		assert($response instanceof OrganizationInviteUpdateResponse);
		
		return $response;
	}
}
