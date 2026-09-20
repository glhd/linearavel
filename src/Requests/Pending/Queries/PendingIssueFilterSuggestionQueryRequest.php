<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueFilterSuggestionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueFilterSuggestionQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueFilterSuggestionQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['filter'];

	protected const ARGUMENT_TYPES = ['projectId' => 'String', 'prompt' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueFilterSuggestion', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueFilterSuggestionPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueFilterSuggestionQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueFilterSuggestionQueryResponse::class, $query))->throw();
		
		assert($response instanceof IssueFilterSuggestionQueryResponse);
		
		return $response;
	}
}
