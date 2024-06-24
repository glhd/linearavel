<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DocumentPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\DocumentCreateResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingDocumentCreateRequest extends PendingLinearRequest
{
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'documentCreate', $args));
	}
	
	public function get(string ...$fields): DocumentPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): DocumentCreateResponse
	{
		$query = $this->query->withFields($fields);
		
		$response = $this->connector->send(new LinearRequest(DocumentCreateResponse::class, (string) $query))->throw();
		
		assert($response instanceof DocumentCreateResponse);
		
		return $response;
	}
}