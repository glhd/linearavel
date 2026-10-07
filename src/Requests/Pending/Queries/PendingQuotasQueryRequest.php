<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationQuotaConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\QuotasQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingQuotasQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.key', 'nodes.limit', 'nodes.name', 'nodes.description'];

	protected const ARGUMENT_TYPES = ['filter' => 'OrganizationQuotaFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'quotas', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): OrganizationQuotaConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): QuotasQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(QuotasQueryResponse::class, $query))->throw();
		
		assert($response instanceof QuotasQueryResponse);
		
		return $response;
	}
}
