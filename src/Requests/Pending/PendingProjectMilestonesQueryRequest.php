<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectMilestoneConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectMilestonesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectMilestonesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'nodes.id',
		'nodes.createdAt',
		'nodes.updatedAt',
		'nodes.name',
		'nodes.sortOrder',
		'nodes.archivedAt',
		'nodes.targetDate',
		'nodes.description',
		'nodes.descriptionData',
		'nodes.descriptionState',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'projectMilestones', $args));
	}
	
	public function get(string ...$fields): ProjectMilestoneConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ProjectMilestonesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectMilestonesQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof ProjectMilestonesQueryResponse);
		
		return $response;
	}
}
