<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TeamMembership;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\TeamMembershipResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTeamMembershipRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'sortOrder', 'archivedAt', 'owner'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'teamMembership', $args));
	}
	
	public function get(string ...$fields): TeamMembership
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TeamMembershipResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TeamMembershipResponse::class, (string) $query))->throw();
		
		assert($response instanceof TeamMembershipResponse);
		
		return $response;
	}
}
