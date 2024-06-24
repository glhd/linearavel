<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationGoogleCalendarPersonalConnectResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationGoogleCalendarPersonalConnectRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationGoogleCalendarPersonalConnect', $args));
	}
	
	public function get(string ...$fields): IntegrationPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationGoogleCalendarPersonalConnectResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(IntegrationGoogleCalendarPersonalConnectResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationGoogleCalendarPersonalConnectResponse);
		
		return $response;
	}
}
