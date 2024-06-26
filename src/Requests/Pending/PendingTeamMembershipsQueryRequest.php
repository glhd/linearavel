<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TeamMembershipConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TeamMembershipsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTeamMembershipsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.sortOrder', 'nodes.archivedAt', 'nodes.owner'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'teamMemberships', $args));
	}
	
	public function get(string ...$fields): TeamMembershipConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TeamMembershipsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TeamMembershipsQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof TeamMembershipsQueryResponse);
		
		return $response;
	}
}
