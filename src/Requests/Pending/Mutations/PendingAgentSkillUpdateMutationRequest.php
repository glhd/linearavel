<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AgentSkillPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\AgentSkillUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAgentSkillUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'AgentSkillUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'agentSkillUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AgentSkillPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AgentSkillUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AgentSkillUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof AgentSkillUpdateMutationResponse);
		
		return $response;
	}
}
