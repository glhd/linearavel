<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\InitiativeFilterSuggestionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\InitiativeFilterSuggestionQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingInitiativeFilterSuggestionQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['filter', 'logId'];

	protected const ARGUMENT_TYPES = ['teamId' => 'String', 'prompt' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'initiativeFilterSuggestion', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): InitiativeFilterSuggestionPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): InitiativeFilterSuggestionQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(InitiativeFilterSuggestionQueryResponse::class, $query))->throw();
		
		assert($response instanceof InitiativeFilterSuggestionQueryResponse);
		
		return $response;
	}
}
