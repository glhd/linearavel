<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\GitAutomationTargetBranchPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\GitAutomationTargetBranchCreateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingGitAutomationTargetBranchCreateRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'gitAutomationTargetBranchCreate', $args));
	}
	
	public function get(string ...$fields): GitAutomationTargetBranchPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): GitAutomationTargetBranchCreateResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(GitAutomationTargetBranchCreateResponse::class, (string) $query))->throw();
		
		assert($response instanceof GitAutomationTargetBranchCreateResponse);
		
		return $response;
	}
}
