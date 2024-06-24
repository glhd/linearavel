<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ExternalUserConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ExternalUsersResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingExternalUsersRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'externalUsers', $args));
	}
	
	public function get(string ...$fields): ExternalUserConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ExternalUsersResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(ExternalUsersResponse::class, (string) $query))->throw();
		
		assert($response instanceof ExternalUsersResponse);
		
		return $response;
	}
}
