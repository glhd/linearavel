<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\RateLimitPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\RateLimitStatusResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingRateLimitStatusRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['kind', 'identifier'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'rateLimitStatus', $args));
	}
	
	public function get(string ...$fields): RateLimitPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): RateLimitStatusResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(RateLimitStatusResponse::class, (string) $query))->throw();
		
		assert($response instanceof RateLimitStatusResponse);
		
		return $response;
	}
}
