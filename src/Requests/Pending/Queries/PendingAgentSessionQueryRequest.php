<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AgentSession;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AgentSessionQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAgentSessionQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'slugId', 'status', 'context', 'externalUrls', 'archivedAt', 'startedAt', 'endedAt', 'dismissedAt', 'externalLink', 'summary', 'sourceMetadata', 'modelSelection', 'plan', 'workspaceDiff', 'type', 'url', 'codingHarnessModelLabel'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'agentSession', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AgentSession
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AgentSessionQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AgentSessionQueryResponse::class, $query))->throw();
		
		assert($response instanceof AgentSessionQueryResponse);
		
		return $response;
	}
}
