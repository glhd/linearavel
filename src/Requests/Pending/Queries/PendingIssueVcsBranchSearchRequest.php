<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Issue;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueVcsBranchSearchResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueVcsBranchSearchRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueVcsBranchSearch', $args));
	}
	
	public function get(string ...$fields): Issue
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssueVcsBranchSearchResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(IssueVcsBranchSearchResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueVcsBranchSearchResponse);
		
		return $response;
	}
}
