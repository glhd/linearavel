<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TeamPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\TeamCyclesDeleteMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTeamCyclesDeleteMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'teamCyclesDelete', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): TeamPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): TeamCyclesDeleteMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TeamCyclesDeleteMutationResponse::class, $query))->throw();
		
		assert($response instanceof TeamCyclesDeleteMutationResponse);
		
		return $response;
	}
}
