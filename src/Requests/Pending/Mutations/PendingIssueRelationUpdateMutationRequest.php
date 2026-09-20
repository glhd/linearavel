<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueRelationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueRelationUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueRelationUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'IssueRelationUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueRelationUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueRelationPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueRelationUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueRelationUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof IssueRelationUpdateMutationResponse);
		
		return $response;
	}
}
