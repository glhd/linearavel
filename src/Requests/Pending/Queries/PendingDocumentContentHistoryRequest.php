<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DocumentContentHistoryPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\DocumentContentHistoryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingDocumentContentHistoryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];
	
	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'documentContentHistory', $args));
	}
	
	public function get(string ...$fields): DocumentContentHistoryPayload
	{
		return $this->response(...$fields)->resolve();
	}
	
	public function response(string ...$fields): DocumentContentHistoryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(DocumentContentHistoryResponse::class, (string) $query))->throw();
		
		assert($response instanceof DocumentContentHistoryResponse);
		
		return $response;
	}
}
