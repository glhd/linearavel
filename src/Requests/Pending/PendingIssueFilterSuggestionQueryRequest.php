<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueFilterSuggestionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueFilterSuggestionQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueFilterSuggestionQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['filter'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueFilterSuggestion', $args));
	}
	
	public function get(string ...$fields): IssueFilterSuggestionPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssueFilterSuggestionQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueFilterSuggestionQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueFilterSuggestionQueryResponse);
		
		return $response;
	}
}
