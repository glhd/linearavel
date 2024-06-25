<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationStartPlusTrialPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OrganizationStartPlusTrialResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationStartPlusTrialRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'organizationStartPlusTrial', $args));
	}
	
	public function get(string ...$fields): OrganizationStartPlusTrialPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): OrganizationStartPlusTrialResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OrganizationStartPlusTrialResponse::class, (string) $query))->throw();
		
		assert($response instanceof OrganizationStartPlusTrialResponse);
		
		return $response;
	}
}
