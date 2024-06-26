<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CreateOrJoinOrganizationResponse;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\CreateOrganizationFromOnboardingMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCreateOrganizationFromOnboardingMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'createOrganizationFromOnboarding', $args));
	}
	
	public function get(string ...$fields): CreateOrJoinOrganizationResponse
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CreateOrganizationFromOnboardingMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CreateOrganizationFromOnboardingMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof CreateOrganizationFromOnboardingMutationResponse);
		
		return $response;
	}
}
