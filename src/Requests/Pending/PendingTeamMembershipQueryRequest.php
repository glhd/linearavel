<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TeamMembership;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TeamMembershipQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTeamMembershipQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'sortOrder', 'archivedAt', 'owner'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'teamMembership', $args));
	}
	
	public function get(string ...$fields): TeamMembership
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TeamMembershipQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TeamMembershipQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof TeamMembershipQueryResponse);
		
		return $response;
	}
}
