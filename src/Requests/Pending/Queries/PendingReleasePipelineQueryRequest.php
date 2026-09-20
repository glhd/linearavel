<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ReleasePipeline;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ReleasePipelineQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReleasePipelineQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'updatedAt', 'name', 'slugId', 'type', 'isProduction', 'autoGenerateReleaseNotesOnCompletion', 'rolloverIssuesOnCompletion', 'includePathPatterns', 'approximateReleaseCount', 'url', 'archivedAt', 'trashed'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'releasePipeline', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ReleasePipeline
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ReleasePipelineQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReleasePipelineQueryResponse::class, $query))->throw();
		
		assert($response instanceof ReleasePipelineQueryResponse);
		
		return $response;
	}
}
