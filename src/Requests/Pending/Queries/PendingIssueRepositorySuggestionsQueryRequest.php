<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\RepositorySuggestionsPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueRepositorySuggestionsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueRepositorySuggestionsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [];

	protected const ARGUMENT_TYPES = ['agentSessionId' => 'String', 'candidateRepositories' => '[CandidateRepository!]!', 'issueId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueRepositorySuggestions', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): RepositorySuggestionsPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueRepositorySuggestionsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueRepositorySuggestionsQueryResponse::class, $query))->throw();
		
		assert($response instanceof IssueRepositorySuggestionsQueryResponse);
		
		return $response;
	}
}
