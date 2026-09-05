<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationPagerDutyRefreshScheduleMappingsMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationPagerDutyRefreshScheduleMappingsMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = [];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationPagerDutyRefreshScheduleMappings', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IntegrationPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IntegrationPagerDutyRefreshScheduleMappingsMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationPagerDutyRefreshScheduleMappingsMutationResponse::class, $query))->throw();
		
		assert($response instanceof IntegrationPagerDutyRefreshScheduleMappingsMutationResponse);
		
		return $response;
	}
}
