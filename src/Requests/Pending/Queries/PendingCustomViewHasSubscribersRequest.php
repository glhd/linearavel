<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomViewHasSubscribersPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CustomViewHasSubscribersResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomViewHasSubscribersRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'customViewHasSubscribers', $args));
	}
	
	public function get(string ...$fields): CustomViewHasSubscribersPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CustomViewHasSubscribersResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(CustomViewHasSubscribersResponse::class, (string) $query))->throw();
		
		assert($response instanceof CustomViewHasSubscribersResponse);
		
		return $response;
	}
}