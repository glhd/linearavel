<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationStartPlusTrialPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OrganizationStartPlusTrialMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationStartPlusTrialMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'organizationStartPlusTrial', $args));
	}
	
	public function get(string ...$fields): OrganizationStartPlusTrialPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): OrganizationStartPlusTrialMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OrganizationStartPlusTrialMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof OrganizationStartPlusTrialMutationResponse);
		
		return $response;
	}
}
