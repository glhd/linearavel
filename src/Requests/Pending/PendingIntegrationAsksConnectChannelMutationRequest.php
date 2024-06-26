<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AsksChannelConnectPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationAsksConnectChannelMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationAsksConnectChannelMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'addBot'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationAsksConnectChannel', $args));
	}
	
	public function get(string ...$fields): AsksChannelConnectPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationAsksConnectChannelMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationAsksConnectChannelMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationAsksConnectChannelMutationResponse);
		
		return $response;
	}
}
