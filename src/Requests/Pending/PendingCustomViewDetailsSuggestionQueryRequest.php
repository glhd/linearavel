<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomViewSuggestionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CustomViewDetailsSuggestionQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomViewDetailsSuggestionQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['name', 'description', 'icon'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'customViewDetailsSuggestion', $args));
	}
	
	public function get(string ...$fields): CustomViewSuggestionPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CustomViewDetailsSuggestionQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(CustomViewDetailsSuggestionQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof CustomViewDetailsSuggestionQueryResponse);
		
		return $response;
	}
}
