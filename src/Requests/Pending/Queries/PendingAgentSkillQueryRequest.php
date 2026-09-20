<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AgentSkill;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AgentSkillQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAgentSkillQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'shared', 'body', 'title', 'slugId', 'recentUsageCount', 'archivedAt', 'teamId', 'description', 'icon', 'color', 'lastUsedAt'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'agentSkill', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AgentSkill
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AgentSkillQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AgentSkillQueryResponse::class, $query))->throw();
		
		assert($response instanceof AgentSkillQueryResponse);
		
		return $response;
	}
}
