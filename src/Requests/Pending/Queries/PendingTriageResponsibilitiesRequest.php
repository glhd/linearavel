<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TriageResponsibilityConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TriageResponsibilitiesResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTriageResponsibilitiesRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'triageResponsibilities', $args));
	}
	
	public function get(string ...$fields): TriageResponsibilityConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TriageResponsibilitiesResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(TriageResponsibilitiesResponse::class, (string) $query))->throw();
		
		assert($response instanceof TriageResponsibilitiesResponse);
		
		return $response;
	}
}
