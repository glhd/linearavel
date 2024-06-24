<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Organization;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\OrganizationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'organization', $args));
	}
	
	public function get(string ...$fields): Organization
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): OrganizationResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(OrganizationResponse::class, (string) $query))->throw();
		
		assert($response instanceof OrganizationResponse);
		
		return $response;
	}
}
