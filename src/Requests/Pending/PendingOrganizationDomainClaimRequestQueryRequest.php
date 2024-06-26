<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationDomainClaimPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\OrganizationDomainClaimRequestQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationDomainClaimRequestQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['verificationString'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'organizationDomainClaimRequest', $args));
	}
	
	public function get(string ...$fields): OrganizationDomainClaimPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): OrganizationDomainClaimRequestQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OrganizationDomainClaimRequestQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof OrganizationDomainClaimRequestQueryResponse);
		
		return $response;
	}
}
