<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AgentActivityConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AgentActivitiesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAgentActivitiesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.content', 'nodes.ephemeral', 'nodes.queued', 'nodes.archivedAt', 'nodes.sourceMetadata', 'nodes.executionSkippedReason', 'nodes.signal', 'nodes.contextualMetadata', 'nodes.sentAt', 'nodes.signalMetadata'];

	protected const ARGUMENT_TYPES = ['filter' => 'AgentActivityFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'agentActivities', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AgentActivityConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AgentActivitiesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AgentActivitiesQueryResponse::class, $query))->throw();
		
		assert($response instanceof AgentActivitiesQueryResponse);
		
		return $response;
	}
}
