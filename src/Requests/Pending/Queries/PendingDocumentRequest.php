<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\Document;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\DocumentResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingDocumentRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'document', $args));
	}
	
	public function get(string ...$fields): Document
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): DocumentResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(DocumentResponse::class, (string) $query))->throw();
		
		assert($response instanceof DocumentResponse);
		
		return $response;
	}
}
