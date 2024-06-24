<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AsksChannelConnectPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationAsksConnectChannelResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationAsksConnectChannelRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationAsksConnectChannel', $args));
	}
	
	public function get(string ...$fields): AsksChannelConnectPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationAsksConnectChannelResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(IntegrationAsksConnectChannelResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationAsksConnectChannelResponse);
		
		return $response;
	}
}
