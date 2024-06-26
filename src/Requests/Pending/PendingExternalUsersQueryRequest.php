<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ExternalUserConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ExternalUsersQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingExternalUsersQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.displayName', 'nodes.archivedAt', 'nodes.email', 'nodes.avatarUrl', 'nodes.lastSeen'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'externalUsers', $args));
	}
	
	public function get(string ...$fields): ExternalUserConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ExternalUsersQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ExternalUsersQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof ExternalUsersQueryResponse);
		
		return $response;
	}
}
