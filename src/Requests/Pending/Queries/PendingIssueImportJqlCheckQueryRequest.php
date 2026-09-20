<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueImportJqlCheckPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueImportJqlCheckQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueImportJqlCheckQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success', 'count', 'error'];

	protected const ARGUMENT_TYPES = ['jiraHostname' => 'String!', 'jiraToken' => 'String!', 'jiraEmail' => 'String!', 'jiraProject' => 'String!', 'jql' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueImportJqlCheck', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueImportJqlCheckPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueImportJqlCheckQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueImportJqlCheckQueryResponse::class, $query))->throw();
		
		assert($response instanceof IssueImportJqlCheckQueryResponse);
		
		return $response;
	}
}
