<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DeletePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\TeamDeleteMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTeamDeleteMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'entityId'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'teamDelete', $args));
	}
	
	public function get(string ...$fields): DeletePayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TeamDeleteMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(TeamDeleteMutationResponse::class, (string) $query))->throw();
		
		assert($response instanceof TeamDeleteMutationResponse);
		
		return $response;
	}
}
