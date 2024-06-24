<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Integration;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IntegrationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'integration', $args));
	}
	
	public function get(string ...$fields): Integration
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(IntegrationResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationResponse);
		
		return $response;
	}
}
