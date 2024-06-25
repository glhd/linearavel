<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Application;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ApplicationInfoByIdsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingApplicationInfoByIdsRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['id', 'clientId', 'name', 'developer', 'developerUrl', 'description', 'imageUrl'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'applicationInfoByIds', $args));
	}
	
	/** @returns Collection<int, Application> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ApplicationInfoByIdsResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ApplicationInfoByIdsResponse::class, (string) $query))->throw();
		
		assert($response instanceof ApplicationInfoByIdsResponse);
		
		return $response;
	}
}
