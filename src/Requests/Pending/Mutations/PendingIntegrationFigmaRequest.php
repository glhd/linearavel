<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IntegrationFigmaResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationFigmaRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'integrationFigma', $args));
	}
	
	public function get(string ...$fields): IntegrationPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationFigmaResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(IntegrationFigmaResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationFigmaResponse);
		
		return $response;
	}
}