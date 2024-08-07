<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ExternalUser;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ExternalUserQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingExternalUserQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'displayName', 'archivedAt', 'email', 'avatarUrl', 'lastSeen'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'externalUser', $args));
	}
	
	public function get(string ...$fields): ExternalUser
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ExternalUserQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ExternalUserQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof ExternalUserQueryResponse);
		
		return $response;
	}
}
