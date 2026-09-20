<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\GitAutomationTargetBranchPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\GitAutomationTargetBranchCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingGitAutomationTargetBranchCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'GitAutomationTargetBranchCreateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'gitAutomationTargetBranchCreate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): GitAutomationTargetBranchPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): GitAutomationTargetBranchCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(GitAutomationTargetBranchCreateMutationResponse::class, $query))->throw();
		
		assert($response instanceof GitAutomationTargetBranchCreateMutationResponse);
		
		return $response;
	}
}
