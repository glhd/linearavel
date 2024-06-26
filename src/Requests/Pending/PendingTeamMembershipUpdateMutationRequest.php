<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TeamMembershipPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\TeamMembershipUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTeamMembershipUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'teamMembershipUpdate', $args));
	}
	
	public function get(string ...$fields): TeamMembershipPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TeamMembershipUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TeamMembershipUpdateMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof TeamMembershipUpdateMutationResponse);
		
		return $response;
	}
}
