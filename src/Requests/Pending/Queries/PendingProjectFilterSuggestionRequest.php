<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectFilterSuggestionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectFilterSuggestionResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectFilterSuggestionRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['filter'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'projectFilterSuggestion', $args));
	}
	
	public function get(string ...$fields): ProjectFilterSuggestionPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ProjectFilterSuggestionResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectFilterSuggestionResponse::class, (string) $query))->throw();
		
		assert($response instanceof ProjectFilterSuggestionResponse);
		
		return $response;
	}
}
