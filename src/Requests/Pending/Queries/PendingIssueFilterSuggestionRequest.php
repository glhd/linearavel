<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueFilterSuggestionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueFilterSuggestionResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueFilterSuggestionRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueFilterSuggestion', $args));
	}
	
	public function get(string ...$fields): IssueFilterSuggestionPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssueFilterSuggestionResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(IssueFilterSuggestionResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueFilterSuggestionResponse);
		
		return $response;
	}
}
