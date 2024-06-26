<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\GitAutomationStatePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\GitAutomationStateUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingGitAutomationStateUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'gitAutomationStateUpdate', $args));
	}
	
	public function get(string ...$fields): GitAutomationStatePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): GitAutomationStateUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(GitAutomationStateUpdateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof GitAutomationStateUpdateMutationResponse);
		
		return $response;
	}
}
