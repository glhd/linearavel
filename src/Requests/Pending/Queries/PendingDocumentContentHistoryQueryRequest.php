<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DocumentContentHistoryPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\DocumentContentHistoryQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingDocumentContentHistoryQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'documentContentHistory', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): DocumentContentHistoryPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): DocumentContentHistoryQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(DocumentContentHistoryQueryResponse::class, $query))->throw();
		
		assert($response instanceof DocumentContentHistoryQueryResponse);
		
		return $response;
	}
}
