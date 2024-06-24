<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DocumentSearchPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\SearchDocumentsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingSearchDocumentsRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'searchDocuments', $args));
	}
	
	public function get(string ...$fields): DocumentSearchPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): SearchDocumentsResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(SearchDocumentsResponse::class, (string) $query))->throw();
		
		assert($response instanceof SearchDocumentsResponse);
		
		return $response;
	}
}
