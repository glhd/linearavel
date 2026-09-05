<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueImportCheckPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueImportCheckCSVQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueImportCheckCSVQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['csvUrl' => 'String!', 'service' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueImportCheckCSV', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueImportCheckPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueImportCheckCSVQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueImportCheckCSVQueryResponse::class, $query))->throw();
		
		assert($response instanceof IssueImportCheckCSVQueryResponse);
		
		return $response;
	}
}
