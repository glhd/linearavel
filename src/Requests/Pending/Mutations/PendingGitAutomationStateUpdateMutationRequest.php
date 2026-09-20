<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\GitAutomationStatePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\GitAutomationStateUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingGitAutomationStateUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'GitAutomationStateUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'gitAutomationStateUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): GitAutomationStatePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): GitAutomationStateUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(GitAutomationStateUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof GitAutomationStateUpdateMutationResponse);
		
		return $response;
	}
}
