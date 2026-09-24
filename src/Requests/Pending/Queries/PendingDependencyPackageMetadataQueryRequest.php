<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DependencyPackageMetadataResult;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\DependencyPackageMetadataQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingDependencyPackageMetadataQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['name', 'version', 'license', 'publishedAt', 'weeklyDownloads'];

	protected const ARGUMENT_TYPES = ['packages' => '[DependencyPackageInput!]!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'dependencyPackageMetadata', $args, static::ARGUMENT_TYPES));
	}

	/** @returns Collection<int, DependencyPackageMetadataResult> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): DependencyPackageMetadataQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(DependencyPackageMetadataQueryResponse::class, $query))->throw();
		
		assert($response instanceof DependencyPackageMetadataQueryResponse);
		
		return $response;
	}
}
