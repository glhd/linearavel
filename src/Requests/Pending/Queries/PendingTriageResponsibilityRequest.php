<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TriageResponsibility;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TriageResponsibilityResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTriageResponsibilityRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'action', 'archivedAt'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'triageResponsibility', $args));
	}
	
	public function get(string ...$fields): TriageResponsibility
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TriageResponsibilityResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TriageResponsibilityResponse::class, (string) $query))->throw();
		
		assert($response instanceof TriageResponsibilityResponse);
		
		return $response;
	}
}
