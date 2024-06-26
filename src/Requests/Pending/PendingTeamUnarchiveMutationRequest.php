<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TeamArchivePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\TeamUnarchiveMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTeamUnarchiveMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'teamUnarchive', $args));
	}
	
	public function get(string ...$fields): TeamArchivePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TeamUnarchiveMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TeamUnarchiveMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof TeamUnarchiveMutationResponse);
		
		return $response;
	}
}
