<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationInviteDetailsPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\OrganizationInviteDetailsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationInviteDetailsRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = [];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'organizationInviteDetails', $args));
	}
	
	public function get(string ...$fields): OrganizationInviteDetailsPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): OrganizationInviteDetailsResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OrganizationInviteDetailsResponse::class, (string) $query))->throw();
		
		assert($response instanceof OrganizationInviteDetailsResponse);
		
		return $response;
	}
}
