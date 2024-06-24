<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationHasScopesPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IntegrationHasScopesResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationHasScopesRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'integrationHasScopes', $args));
	}
	
	public function get(string ...$fields): IntegrationHasScopesPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationHasScopesResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(IntegrationHasScopesResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationHasScopesResponse);
		
		return $response;
	}
}
