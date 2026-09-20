<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\GithubOAuthTokenPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueImportFinishGithubOAuthQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueImportFinishGithubOAuthQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['token'];

	protected const ARGUMENT_TYPES = ['code' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueImportFinishGithubOAuth', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): GithubOAuthTokenPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueImportFinishGithubOAuthQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueImportFinishGithubOAuthQueryResponse::class, $query))->throw();
		
		assert($response instanceof IssueImportFinishGithubOAuthQueryResponse);
		
		return $response;
	}
}
