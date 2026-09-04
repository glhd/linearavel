<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomView;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CustomViewQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomViewQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'filters', 'filterData', 'shared', 'modelName', 'archivedAt', 'description', 'icon', 'color', 'projectFilterData'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'customView', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomView
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomViewQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomViewQueryResponse::class, $query))->throw();
		
		assert($response instanceof CustomViewQueryResponse);
		
		return $response;
	}
}
