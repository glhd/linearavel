<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ApiKeyPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\ApiKeyCreateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingApiKeyCreateRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'apiKeyCreate', $args));
	}
	
	public function get(string ...$fields): ApiKeyPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): ApiKeyCreateResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ApiKeyCreateResponse::class, (string) $query))->throw();
		
		assert($response instanceof ApiKeyCreateResponse);
		
		return $response;
	}
}
