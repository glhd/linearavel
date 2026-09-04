<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\GitAutomationStatePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\GitAutomationStateCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingGitAutomationStateCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'GitAutomationStateCreateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'gitAutomationStateCreate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): GitAutomationStatePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): GitAutomationStateCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(GitAutomationStateCreateMutationResponse::class, $query))->throw();
		
		assert($response instanceof GitAutomationStateCreateMutationResponse);
		
		return $response;
	}
}
