<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\WorkspaceAuthorizedApplication;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ApplicationInfoWithMembershipsByIdsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingApplicationInfoWithMembershipsByIdsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['name', 'scope', 'appId', 'clientId', 'webhooksEnabled', 'totalMembers', 'imageUrl'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'applicationInfoWithMembershipsByIds', $args));
	}
	
	/** @returns Collection<int, WorkspaceAuthorizedApplication> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ApplicationInfoWithMembershipsByIdsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ApplicationInfoWithMembershipsByIdsQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof ApplicationInfoWithMembershipsByIdsQueryResponse);
		
		return $response;
	}
}
