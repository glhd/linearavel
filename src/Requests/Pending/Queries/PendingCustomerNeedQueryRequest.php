<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomerNeed;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CustomerNeedQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomerNeedQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'priority', 'archivedAt', 'body', 'bodyData', 'url', 'content'];

	protected const ARGUMENT_TYPES = ['id' => 'String', 'hash' => 'String'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'customerNeed', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomerNeed
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomerNeedQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomerNeedQueryResponse::class, $query))->throw();
		
		assert($response instanceof CustomerNeedQueryResponse);
		
		return $response;
	}
}
