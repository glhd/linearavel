<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\WorkspaceAuthorizedApplication;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ApplicationInfoWithMembershipsByIdsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingApplicationInfoWithMembershipsByIdsRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'applicationInfoWithMembershipsByIds', $args));
	}
	
	/** @returns Collection<int, WorkspaceAuthorizedApplication> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ApplicationInfoWithMembershipsByIdsResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(ApplicationInfoWithMembershipsByIdsResponse::class, (string) $query))->throw();
		
		assert($response instanceof ApplicationInfoWithMembershipsByIdsResponse);
		
		return $response;
	}
}
