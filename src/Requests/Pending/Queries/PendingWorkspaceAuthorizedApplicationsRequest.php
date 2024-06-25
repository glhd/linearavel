<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\WorkspaceAuthorizedApplication;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\WorkspaceAuthorizedApplicationsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingWorkspaceAuthorizedApplicationsRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['name', 'scope', 'appId', 'clientId', 'webhooksEnabled', 'totalMembers', 'imageUrl'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'workspaceAuthorizedApplications', $args));
	}
	
	/** @returns Collection<int, WorkspaceAuthorizedApplication> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): WorkspaceAuthorizedApplicationsResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(WorkspaceAuthorizedApplicationsResponse::class, (string) $query))->throw();
		
		assert($response instanceof WorkspaceAuthorizedApplicationsResponse);
		
		return $response;
	}
}
