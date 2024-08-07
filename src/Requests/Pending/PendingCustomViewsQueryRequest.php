<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomViewConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CustomViewsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomViewsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = [
		'nodes.id',
		'nodes.createdAt',
		'nodes.updatedAt',
		'nodes.name',
		'nodes.filters',
		'nodes.filterData',
		'nodes.shared',
		'nodes.modelName',
		'nodes.archivedAt',
		'nodes.description',
		'nodes.icon',
		'nodes.color',
		'nodes.projectFilterData',
	];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'customViews', $args));
	}
	
	public function get(string ...$fields): CustomViewConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CustomViewsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomViewsQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof CustomViewsQueryResponse);
		
		return $response;
	}
}
