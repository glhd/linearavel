<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AgentActivityPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\AgentActivityCreatePromptMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAgentActivityCreatePromptMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'AgentActivityCreatePromptInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'agentActivityCreatePrompt', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AgentActivityPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AgentActivityCreatePromptMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AgentActivityCreatePromptMutationResponse::class, $query))->throw();
		
		assert($response instanceof AgentActivityCreatePromptMutationResponse);
		
		return $response;
	}
}
