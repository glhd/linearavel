<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationDomainSimplePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OrganizationDomainClaimResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationDomainClaimRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'organizationDomainClaim', $args));
	}
	
	public function get(string ...$fields): OrganizationDomainSimplePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): OrganizationDomainClaimResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(OrganizationDomainClaimResponse::class, (string) $query))->throw();
		
		assert($response instanceof OrganizationDomainClaimResponse);
		
		return $response;
	}
}
