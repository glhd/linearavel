<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomViewHasSubscribersPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CustomViewHasSubscribersQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomViewHasSubscribersQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['hasSubscribers'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'customViewHasSubscribers', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomViewHasSubscribersPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomViewHasSubscribersQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomViewHasSubscribersQueryResponse::class, $query))->throw();
		
		assert($response instanceof CustomViewHasSubscribersQueryResponse);
		
		return $response;
	}
}
