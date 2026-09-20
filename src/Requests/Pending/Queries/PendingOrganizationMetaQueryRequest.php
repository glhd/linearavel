<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OrganizationMeta;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\OrganizationMetaQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOrganizationMetaQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['region', 'allowedAuthServices'];

	protected const ARGUMENT_TYPES = ['urlKey' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'organizationMeta', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ?OrganizationMeta
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OrganizationMetaQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OrganizationMetaQueryResponse::class, $query))->throw();
		
		assert($response instanceof OrganizationMetaQueryResponse);
		
		return $response;
	}
}
