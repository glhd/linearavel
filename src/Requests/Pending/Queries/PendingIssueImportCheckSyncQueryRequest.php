<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueImportSyncCheckPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueImportCheckSyncQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueImportCheckSyncQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['canSync', 'error'];

	protected const ARGUMENT_TYPES = ['issueImportId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueImportCheckSync', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueImportSyncCheckPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueImportCheckSyncQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueImportCheckSyncQueryResponse::class, $query))->throw();
		
		assert($response instanceof IssueImportCheckSyncQueryResponse);
		
		return $response;
	}
}
