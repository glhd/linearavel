<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TeamMembershipPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\TeamMembershipCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTeamMembershipCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'teamMembershipCreate', $args));
	}
	
	public function get(string ...$fields): TeamMembershipPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TeamMembershipCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TeamMembershipCreateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof TeamMembershipCreateMutationResponse);
		
		return $response;
	}
}
