<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\RateLimitPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\RateLimitStatusQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingRateLimitStatusQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['kind', 'identifier'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'rateLimitStatus', $args));
	}
	
	public function get(string ...$fields): RateLimitPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): RateLimitStatusQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(RateLimitStatusQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof RateLimitStatusQueryResponse);
		
		return $response;
	}
}
