<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\GitAutomationTargetBranchPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\GitAutomationTargetBranchUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingGitAutomationTargetBranchUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'gitAutomationTargetBranchUpdate', $args));
	}
	
	public function get(string ...$fields): GitAutomationTargetBranchPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): GitAutomationTargetBranchUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(GitAutomationTargetBranchUpdateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof GitAutomationTargetBranchUpdateMutationResponse);
		
		return $response;
	}
}
