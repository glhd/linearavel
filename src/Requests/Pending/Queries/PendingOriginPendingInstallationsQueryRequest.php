<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OriginInstallationDetails;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\OriginPendingInstallationsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingOriginPendingInstallationsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['installationId', 'ownerSlug', 'repositorySelection', 'connectedToWorkspace', 'ownerType'];

	protected const ARGUMENT_TYPES = [];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'originPendingInstallations', $args, static::ARGUMENT_TYPES));
	}

	/** @returns Collection<int, OriginInstallationDetails> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OriginPendingInstallationsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OriginPendingInstallationsQueryResponse::class, $query))->throw();
		
		assert($response instanceof OriginPendingInstallationsQueryResponse);
		
		return $response;
	}
}
