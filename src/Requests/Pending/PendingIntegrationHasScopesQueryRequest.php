<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IntegrationHasScopesPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IntegrationHasScopesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIntegrationHasScopesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['hasAllScopes', 'missingScopes'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'integrationHasScopes', $args));
	}
	
	public function get(string ...$fields): IntegrationHasScopesPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IntegrationHasScopesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IntegrationHasScopesQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof IntegrationHasScopesQueryResponse);
		
		return $response;
	}
}
