<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueImportCheckPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueImportCheckCSVResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueImportCheckCSVRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueImportCheckCSV', $args));
	}
	
	public function get(string ...$fields): IssueImportCheckPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssueImportCheckCSVResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueImportCheckCSVResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueImportCheckCSVResponse);
		
		return $response;
	}
}
