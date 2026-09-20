<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Diff;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\DiffQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingDiffQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'contentHash', 'fileCount', 'additions', 'deletions', 'truncated', 'slugId', 'archivedAt'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'diff', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): Diff
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): DiffQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(DiffQueryResponse::class, $query))->throw();
		
		assert($response instanceof DiffQueryResponse);
		
		return $response;
	}
}
