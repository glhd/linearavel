<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DocumentConnection;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\DocumentsResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingDocumentsRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'documents', $args));
	}
	
	public function get(string ...$fields): DocumentConnection
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): DocumentsResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(DocumentsResponse::class, (string) $query))->throw();
		
		assert($response instanceof DocumentsResponse);
		
		return $response;
	}
}