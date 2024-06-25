<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CreateOrJoinOrganizationResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CreateOrganizationFromOnboardingResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCreateOrganizationFromOnboardingRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = [];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'createOrganizationFromOnboarding', $args));
	}
	
	public function get(string ...$fields): CreateOrJoinOrganizationResponse
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CreateOrganizationFromOnboardingResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CreateOrganizationFromOnboardingResponse::class, (string) $query))->throw();
		
		assert($response instanceof CreateOrganizationFromOnboardingResponse);
		
		return $response;
	}
}
