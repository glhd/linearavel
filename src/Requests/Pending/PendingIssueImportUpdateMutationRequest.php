<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueImportPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueImportUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueImportUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueImportUpdate', $args));
	}
	
	public function get(string ...$fields): IssueImportPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssueImportUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueImportUpdateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueImportUpdateMutationResponse);
		
		return $response;
	}
}
