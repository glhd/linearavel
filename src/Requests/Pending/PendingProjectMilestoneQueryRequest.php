<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectMilestone;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectMilestoneQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectMilestoneQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'sortOrder', 'archivedAt', 'targetDate', 'description', 'descriptionData', 'descriptionState'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'projectMilestone', $args));
	}
	
	public function get(string ...$fields): ProjectMilestone
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ProjectMilestoneQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectMilestoneQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof ProjectMilestoneQueryResponse);
		
		return $response;
	}
}
