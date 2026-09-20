<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationDatadogEnvironmentsPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationDatadogEnvironmentsMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationDatadogEnvironmentsMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [];

	protected const ARGUMENT_TYPES = ['site' => 'String!', 'apiKey' => 'String!', 'applicationKey' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationDatadogEnvironments', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IntegrationDatadogEnvironmentsPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IntegrationDatadogEnvironmentsMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationDatadogEnvironmentsMutationResponse::class, $query))->throw();
		
		assert($response instanceof IntegrationDatadogEnvironmentsMutationResponse);
		
		return $response;
	}
}
