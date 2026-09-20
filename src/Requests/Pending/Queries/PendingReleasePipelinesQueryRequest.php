<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ReleasePipelineConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ReleasePipelinesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReleasePipelinesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['nodes.id', 'nodes.createdAt', 'nodes.updatedAt', 'nodes.name', 'nodes.slugId', 'nodes.type', 'nodes.isProduction', 'nodes.autoGenerateReleaseNotesOnCompletion', 'nodes.rolloverIssuesOnCompletion', 'nodes.includePathPatterns', 'nodes.approximateReleaseCount', 'nodes.url', 'nodes.archivedAt', 'nodes.trashed'];

	protected const ARGUMENT_TYPES = ['filter' => 'ReleasePipelineFilter', 'before' => 'String', 'after' => 'String', 'first' => 'Int', 'last' => 'Int', 'includeArchived' => 'Boolean', 'orderBy' => 'PaginationOrderBy', 'sort' => '[ReleasePipelineSortInput!]'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'releasePipelines', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ReleasePipelineConnection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ReleasePipelinesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReleasePipelinesQueryResponse::class, $query))->throw();
		
		assert($response instanceof ReleasePipelinesQueryResponse);
		
		return $response;
	}
}
