<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\GitAutomationTargetBranchPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\GitAutomationTargetBranchCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingGitAutomationTargetBranchCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'gitAutomationTargetBranchCreate', $args));
	}
	
	public function get(string ...$fields): GitAutomationTargetBranchPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): GitAutomationTargetBranchCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(GitAutomationTargetBranchCreateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof GitAutomationTargetBranchCreateMutationResponse);
		
		return $response;
	}
}
