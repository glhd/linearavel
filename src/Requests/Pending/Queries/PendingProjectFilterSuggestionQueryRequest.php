<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\ProjectFilterSuggestionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\ProjectFilterSuggestionQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingProjectFilterSuggestionQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['filter'];

	protected const ARGUMENT_TYPES = ['prompt' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'projectFilterSuggestion', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): ProjectFilterSuggestionPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): ProjectFilterSuggestionQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(ProjectFilterSuggestionQueryResponse::class, $query))->throw();
		
		assert($response instanceof ProjectFilterSuggestionQueryResponse);
		
		return $response;
	}
}
