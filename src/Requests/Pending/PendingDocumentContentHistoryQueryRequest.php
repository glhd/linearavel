<?php

namespace Glhd\Linearavel\Requests\Pending;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DocumentContentHistoryPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\DocumentContentHistoryQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingDocumentContentHistoryQueryRequest extends PendingLinearRequest
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
	
	public function response(string ...$fields): DocumentContentHistoryQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(DocumentContentHistoryQueryResponse::class, (string) $query))->throw();
		
		assert($response instanceof DocumentContentHistoryQueryResponse);
		
		return $response;
	}
}
