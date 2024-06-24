<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\GitAutomationStatePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\GitAutomationStateCreateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingGitAutomationStateCreateRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'gitAutomationStateCreate', $args));
	}
	
	public function get(string ...$fields): GitAutomationStatePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): GitAutomationStateCreateResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(GitAutomationStateCreateResponse::class, (string) $query))->throw();
		
		assert($response instanceof GitAutomationStateCreateResponse);
		
		return $response;
	}
}