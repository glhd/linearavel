<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssuePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\IssueUnsubscribeMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueUnsubscribeMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['userId' => 'String', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'issueUnsubscribe', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssuePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueUnsubscribeMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueUnsubscribeMutationResponse::class, $query))->throw();
		
		assert($response instanceof IssueUnsubscribeMutationResponse);
		
		return $response;
	}
}
