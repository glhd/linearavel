<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AgentSessionConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AgentSessionsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAgentSessionsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.slugId', 'nodes.status', 'nodes.context', 'nodes.externalUrls', 'nodes.archivedAt', 'nodes.startedAt', 'nodes.endedAt', 'nodes.dismissedAt', 'nodes.externalLink', 'nodes.summary', 'nodes.sourceMetadata', 'nodes.modelSelection', 'nodes.plan', 'nodes.workspaceDiff', 'nodes.type', 'nodes.url', 'nodes.codingHarnessModelLabel'];

	protected const ARGUMENT_TYPES = ['before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'agentSessions', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AgentSessionConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AgentSessionsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AgentSessionsQueryResponse::class, $query))->throw();
		
		assert($response instanceof AgentSessionsQueryResponse);
		
		return $response;
	}
}
