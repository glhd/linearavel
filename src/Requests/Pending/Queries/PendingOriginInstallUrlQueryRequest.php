<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OriginInstallUrlPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\OriginInstallUrlQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOriginInstallUrlQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['installUrl'];

	protected const ARGUMENT_TYPES = [];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'originInstallUrl', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): OriginInstallUrlPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OriginInstallUrlQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OriginInstallUrlQueryResponse::class, $query))->throw();
		
		assert($response instanceof OriginInstallUrlQueryResponse);
		
		return $response;
	}
}
