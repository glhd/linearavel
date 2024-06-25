<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationPagerDutyRefreshScheduleMappingsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationPagerDutyRefreshScheduleMappingsRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationPagerDutyRefreshScheduleMappings', $args));
	}
	
	public function get(string ...$fields): IntegrationPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationPagerDutyRefreshScheduleMappingsResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationPagerDutyRefreshScheduleMappingsResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationPagerDutyRefreshScheduleMappingsResponse);
		
		return $response;
	}
}
