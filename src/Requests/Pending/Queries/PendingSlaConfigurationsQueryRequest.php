<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\SlaConfiguration;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\SlaConfigurationsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingSlaConfigurationsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'name', 'conditions', 'removesSla', 'sla', 'slaType', 'startMode'];

	protected const ARGUMENT_TYPES = ['teamId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'slaConfigurations', $args, static::ARGUMENT_TYPES));
	}

	/** @returns Collection<int, SlaConfiguration> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): SlaConfigurationsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(SlaConfigurationsQueryResponse::class, $query))->throw();
		
		assert($response instanceof SlaConfigurationsQueryResponse);
		
		return $response;
	}
}
