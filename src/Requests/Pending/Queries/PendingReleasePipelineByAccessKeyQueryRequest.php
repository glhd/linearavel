<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\AccessKeyReleasePipeline;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ReleasePipelineByAccessKeyQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingReleasePipelineByAccessKeyQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'includePathPatterns'];

	protected const ARGUMENT_TYPES = [];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'releasePipelineByAccessKey', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): AccessKeyReleasePipeline
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ReleasePipelineByAccessKeyQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ReleasePipelineByAccessKeyQueryResponse::class, $query))->throw();
		
		assert($response instanceof ReleasePipelineByAccessKeyQueryResponse);
		
		return $response;
	}
}
