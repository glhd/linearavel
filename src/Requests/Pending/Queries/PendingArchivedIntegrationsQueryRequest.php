<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ArchivedIntegrationPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ArchivedIntegrationsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingArchivedIntegrationsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'service', 'archivedAt', 'orgLogin', 'externalOrgId', 'orgAvatarUrl', 'enterpriseUrl', 'codeAccess'];

	protected const ARGUMENT_TYPES = [];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'archivedIntegrations', $args, static::ARGUMENT_TYPES));
	}

	/** @returns Collection<int, ArchivedIntegrationPayload> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ArchivedIntegrationsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ArchivedIntegrationsQueryResponse::class, $query))->throw();
		
		assert($response instanceof ArchivedIntegrationsQueryResponse);
		
		return $response;
	}
}
