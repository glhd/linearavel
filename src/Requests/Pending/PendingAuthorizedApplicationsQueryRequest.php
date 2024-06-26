<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AuthorizedApplication;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AuthorizedApplicationsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingAuthorizedApplicationsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['name', 'scope', 'appId', 'clientId', 'webhooksEnabled', 'imageUrl'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'authorizedApplications', $args));
	}
	
	/** @returns Collection<int, AuthorizedApplication> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): AuthorizedApplicationsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AuthorizedApplicationsQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof AuthorizedApplicationsQueryResponse);
		
		return $response;
	}
}
