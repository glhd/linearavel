<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AgentSkillConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AgentSkillsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAgentSkillsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.shared', 'nodes.body', 'nodes.title', 'nodes.slugId', 'nodes.recentUsageCount', 'nodes.archivedAt', 'nodes.teamId', 'nodes.description', 'nodes.icon', 'nodes.color', 'nodes.lastUsedAt'];

	protected const ARGUMENT_TYPES = ['filter' => 'AgentSkillFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'agentSkills', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AgentSkillConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AgentSkillsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AgentSkillsQueryResponse::class, $query))->throw();
		
		assert($response instanceof AgentSkillsQueryResponse);
		
		return $response;
	}
}
