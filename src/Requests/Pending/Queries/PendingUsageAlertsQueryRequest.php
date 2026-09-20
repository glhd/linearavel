<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UsageAlertConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\UsageAlertsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUsageAlertsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.type', 'nodes.metadata', 'nodes.archivedAt', 'nodes.resolvedAt'];

	protected const ARGUMENT_TYPES = ['filter' => 'UsageAlertFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'usageAlerts', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): UsageAlertConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): UsageAlertsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UsageAlertsQueryResponse::class, $query))->throw();
		
		assert($response instanceof UsageAlertsQueryResponse);
		
		return $response;
	}
}
