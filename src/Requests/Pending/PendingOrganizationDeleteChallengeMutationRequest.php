<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationDeletePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OrganizationDeleteChallengeMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationDeleteChallengeMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'organizationDeleteChallenge', $args));
	}
	
	public function get(string ...$fields): OrganizationDeletePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): OrganizationDeleteChallengeMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OrganizationDeleteChallengeMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof OrganizationDeleteChallengeMutationResponse);
		
		return $response;
	}
}
