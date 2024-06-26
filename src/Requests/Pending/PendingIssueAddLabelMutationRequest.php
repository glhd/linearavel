<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssuePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueAddLabelMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueAddLabelMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueAddLabel', $args));
	}
	
	public function get(string ...$fields): IssuePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssueAddLabelMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueAddLabelMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueAddLabelMutationResponse);
		
		return $response;
	}
}
