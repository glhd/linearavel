<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Application;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ApplicationInfoQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingApplicationInfoQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'clientId', 'name', 'developer', 'developerUrl', 'description', 'imageUrl'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'applicationInfo', $args));
	}
	
	public function get(string ...$fields): Application
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ApplicationInfoQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ApplicationInfoQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof ApplicationInfoQueryResponse);
		
		return $response;
	}
}
