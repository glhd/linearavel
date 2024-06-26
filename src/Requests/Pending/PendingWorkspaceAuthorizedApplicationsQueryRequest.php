<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\WorkspaceAuthorizedApplication;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\WorkspaceAuthorizedApplicationsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingWorkspaceAuthorizedApplicationsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['name', 'scope', 'appId', 'clientId', 'webhooksEnabled', 'totalMembers', 'imageUrl'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'workspaceAuthorizedApplications', $args));
	}
	
	/** @returns Collection<int, WorkspaceAuthorizedApplication> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): WorkspaceAuthorizedApplicationsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(WorkspaceAuthorizedApplicationsQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof WorkspaceAuthorizedApplicationsQueryResponse);
		
		return $response;
	}
}
