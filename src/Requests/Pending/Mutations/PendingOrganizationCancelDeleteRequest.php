<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationCancelDeletePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OrganizationCancelDeleteResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationCancelDeleteRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'organizationCancelDelete', $args));
	}
	
	public function get(string ...$fields): OrganizationCancelDeletePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): OrganizationCancelDeleteResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OrganizationCancelDeleteResponse::class, (string) $query))->throw();
		
		assert($response instanceof OrganizationCancelDeleteResponse);
		
		return $response;
	}
}
