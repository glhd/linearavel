<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AgentActivityPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\AgentActivitySendQueuedMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAgentActivitySendQueuedMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'agentActivitySendQueued', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AgentActivityPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AgentActivitySendQueuedMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AgentActivitySendQueuedMutationResponse::class, $query))->throw();
		
		assert($response instanceof AgentActivitySendQueuedMutationResponse);
		
		return $response;
	}
}
