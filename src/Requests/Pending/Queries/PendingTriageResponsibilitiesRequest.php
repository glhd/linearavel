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
	protected const AVAILABLE_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.action', 'nodes.archivedAt'];
	
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
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TriageResponsibilitiesResponse::class, (string) $query))->throw();
		
		assert($response instanceof TriageResponsibilitiesResponse);
		
		return $response;
	}
}
