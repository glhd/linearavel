<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TeamPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\TeamUpdateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTeamUpdateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'TeamUpdateInput!', 'id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'teamUpdate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): TeamPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): TeamUpdateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TeamUpdateMutationResponse::class, $query))->throw();
		
		assert($response instanceof TeamUpdateMutationResponse);
		
		return $response;
	}
}
