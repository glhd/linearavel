<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\UsageAlert;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\UsageAlertQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingUsageAlertQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'type', 'metadata', 'archivedAt', 'resolvedAt'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'usageAlert', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): UsageAlert
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): UsageAlertQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(UsageAlertQueryResponse::class, $query))->throw();
		
		assert($response instanceof UsageAlertQueryResponse);
		
		return $response;
	}
}
