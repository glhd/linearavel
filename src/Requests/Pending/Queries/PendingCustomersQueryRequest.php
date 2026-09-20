<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomerConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CustomersQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomersQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.domains', 'nodes.externalIds', 'nodes.approximateNeedCount', 'nodes.slugId', 'nodes.url', 'nodes.archivedAt', 'nodes.logoUrl', 'nodes.slackChannelId', 'nodes.revenue', 'nodes.size', 'nodes.mainSourceId'];

	protected const ARGUMENT_TYPES = ['filter' => 'CustomerFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy', 'sorts' => '[CustomerSortInput!]'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'customers', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): CustomerConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): CustomersQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomersQueryResponse::class, $query))->throw();
		
		assert($response instanceof CustomersQueryResponse);
		
		return $response;
	}
}
