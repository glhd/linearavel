<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationDeletePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OrganizationDeleteChallengeResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationDeleteChallengeRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'organizationDeleteChallenge', $args));
	}
	
	public function get(string ...$fields): OrganizationDeletePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): OrganizationDeleteChallengeResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(OrganizationDeleteChallengeResponse::class, (string) $query))->throw();
		
		assert($response instanceof OrganizationDeleteChallengeResponse);
		
		return $response;
	}
}