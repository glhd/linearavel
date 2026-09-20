<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AgentActivity;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AgentActivityQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAgentActivityQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'content', 'ephemeral', 'queued', 'archivedAt', 'sourceMetadata', 'executionSkippedReason', 'signal', 'contextualMetadata', 'sentAt', 'signalMetadata'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'agentActivity', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AgentActivity
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AgentActivityQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AgentActivityQueryResponse::class, $query))->throw();
		
		assert($response instanceof AgentActivityQueryResponse);
		
		return $response;
	}
}
