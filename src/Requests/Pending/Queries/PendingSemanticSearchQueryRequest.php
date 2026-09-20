<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\SemanticSearchPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\SemanticSearchQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingSemanticSearchQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['enabled'];

	protected const ARGUMENT_TYPES = ['query' => 'String!', 'types' => '[SemanticSearchResultType!]', 'maxResults' => 'Int', 'includeArchived' => 'Boolean', 'filters' => 'SemanticSearchFilters'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'semanticSearch', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): SemanticSearchPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): SemanticSearchQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(SemanticSearchQueryResponse::class, $query))->throw();
		
		assert($response instanceof SemanticSearchQueryResponse);
		
		return $response;
	}
}
