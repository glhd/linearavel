<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Customer;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CustomerQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomerQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'domains', 'externalIds', 'approximateNeedCount', 'slugId', 'url', 'archivedAt', 'logoUrl', 'slackChannelId', 'revenue', 'size', 'mainSourceId'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'customer', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): Customer
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomerQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomerQueryResponse::class, $query))->throw();
		
		assert($response instanceof CustomerQueryResponse);
		
		return $response;
	}
}
