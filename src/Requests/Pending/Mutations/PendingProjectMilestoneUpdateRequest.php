<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectMilestonePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ProjectMilestoneUpdateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectMilestoneUpdateRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'projectMilestoneUpdate', $args));
	}
	
	public function get(string ...$fields): ProjectMilestonePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ProjectMilestoneUpdateResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(ProjectMilestoneUpdateResponse::class, (string) $query))->throw();
		
		assert($response instanceof ProjectMilestoneUpdateResponse);
		
		return $response;
	}
}
