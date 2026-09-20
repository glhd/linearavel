<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AgentSessionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\AgentSessionCreateOnCommentMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingAgentSessionCreateOnCommentMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'AgentSessionCreateOnComment!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'agentSessionCreateOnComment', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AgentSessionPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AgentSessionCreateOnCommentMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AgentSessionCreateOnCommentMutationResponse::class, $query))->throw();
		
		assert($response instanceof AgentSessionCreateOnCommentMutationResponse);
		
		return $response;
	}
}
