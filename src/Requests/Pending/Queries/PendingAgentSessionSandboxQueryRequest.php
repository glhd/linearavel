<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CodingAgentSandboxPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AgentSessionSandboxQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAgentSessionSandboxQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['agentSessionId', 'datadogLogsUrl', 'temporalWorkflowsUrl'];

	protected const ARGUMENT_TYPES = ['agentSessionId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'agentSessionSandbox', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ?CodingAgentSandboxPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AgentSessionSandboxQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AgentSessionSandboxQueryResponse::class, $query))->throw();
		
		assert($response instanceof AgentSessionSandboxQueryResponse);
		
		return $response;
	}
}
