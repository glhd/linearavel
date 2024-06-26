<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueRelationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueRelationUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueRelationUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueRelationUpdate', $args));
	}
	
	public function get(string ...$fields): IssueRelationPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): IssueRelationUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueRelationUpdateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof IssueRelationUpdateMutationResponse);
		
		return $response;
	}
}
