<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomView;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CustomViewResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomViewRequest extends PendingLinearRequest
{
	protected const AVAILABLE_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'filters', 'filterData', 'shared', 'modelName', 'archivedAt', 'description', 'icon', 'color', 'projectFilterData'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'customView', $args));
	}
	
	public function get(string ...$fields): CustomView
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CustomViewResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomViewResponse::class, (string) $query))->throw();
		
		assert($response instanceof CustomViewResponse);
		
		return $response;
	}
}
