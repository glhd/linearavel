<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationExistsPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\OrganizationExistsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationExistsRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success', 'exists'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'organizationExists', $args));
	}
	
	public function get(string ...$fields): OrganizationExistsPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): OrganizationExistsResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OrganizationExistsResponse::class, (string) $query))->throw();
		
		assert($response instanceof OrganizationExistsResponse);
		
		return $response;
	}
}
