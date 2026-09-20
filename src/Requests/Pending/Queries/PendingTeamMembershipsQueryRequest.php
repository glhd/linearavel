<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TeamMembershipConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TeamMembershipsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTeamMembershipsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.sortOrder', 'nodes.archivedAt', 'nodes.owner'];

	protected const ARGUMENT_TYPES = ['before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'teamMemberships', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): TeamMembershipConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): TeamMembershipsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TeamMembershipsQueryResponse::class, $query))->throw();
		
		assert($response instanceof TeamMembershipsQueryResponse);
		
		return $response;
	}
}
