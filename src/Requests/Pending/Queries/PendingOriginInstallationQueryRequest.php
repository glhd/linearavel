<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OriginInstallationDetails;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\OriginInstallationQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOriginInstallationQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['installationId', 'ownerSlug', 'repositorySelection', 'connectedToWorkspace', 'ownerType'];

	protected const ARGUMENT_TYPES = ['installationId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'originInstallation', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): OriginInstallationDetails
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OriginInstallationQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OriginInstallationQueryResponse::class, $query))->throw();
		
		assert($response instanceof OriginInstallationQueryResponse);
		
		return $response;
	}
}
