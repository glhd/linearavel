<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\TeamPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\TeamCyclesDeleteResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingTeamCyclesDeleteRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'teamCyclesDelete', $args));
	}
	
	public function get(string ...$fields): TeamPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): TeamCyclesDeleteResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(TeamCyclesDeleteResponse::class, (string) $query))->throw();
		
		assert($response instanceof TeamCyclesDeleteResponse);
		
		return $response;
	}
}