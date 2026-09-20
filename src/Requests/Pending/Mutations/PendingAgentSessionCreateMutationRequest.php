<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AgentSessionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\AgentSessionCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAgentSessionCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['pullRequestId' => 'String', 'input' => 'AgentSessionCreateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'agentSessionCreate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AgentSessionPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AgentSessionCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AgentSessionCreateMutationResponse::class, $query))->throw();
		
		assert($response instanceof AgentSessionCreateMutationResponse);
		
		return $response;
	}
}
