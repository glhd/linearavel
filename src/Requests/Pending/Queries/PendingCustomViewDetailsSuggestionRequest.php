<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\CustomViewSuggestionPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\CustomViewDetailsSuggestionResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingCustomViewDetailsSuggestionRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'customViewDetailsSuggestion', $args));
	}
	
	public function get(string ...$fields): CustomViewSuggestionPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): CustomViewDetailsSuggestionResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(CustomViewDetailsSuggestionResponse::class, (string) $query))->throw();
		
		assert($response instanceof CustomViewDetailsSuggestionResponse);
		
		return $response;
	}
}
