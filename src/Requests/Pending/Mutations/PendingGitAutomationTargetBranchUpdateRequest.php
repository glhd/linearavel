<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\GitAutomationTargetBranchPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\GitAutomationTargetBranchUpdateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingGitAutomationTargetBranchUpdateRequest extends PendingLinearRequest
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
	
	public function response(string ...$fields): GitAutomationTargetBranchUpdateResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(GitAutomationTargetBranchUpdateResponse::class, (string) $query))->throw();
		
		assert($response instanceof GitAutomationTargetBranchUpdateResponse);
		
		return $response;
	}
}
