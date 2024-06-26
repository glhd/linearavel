<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueImportPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueImportCreateCSVJiraMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueImportCreateCSVJiraMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueImportCreateCSVJira', $args));
	}
	
	public function get(string ...$fields): IssueImportPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssueImportCreateCSVJiraMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueImportCreateCSVJiraMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueImportCreateCSVJiraMutationResponse);
		
		return $response;
	}
}
