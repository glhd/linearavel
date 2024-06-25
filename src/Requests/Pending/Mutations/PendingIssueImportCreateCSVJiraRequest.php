<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueImportPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueImportCreateCSVJiraResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueImportCreateCSVJiraRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueImportCreateCSVJira', $args));
	}
	
	public function get(string ...$fields): IssueImportPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssueImportCreateCSVJiraResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueImportCreateCSVJiraResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueImportCreateCSVJiraResponse);
		
		return $response;
	}
}
