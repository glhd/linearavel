<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DocumentContentHistoryPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\DocumentContentHistoryEntriesQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingDocumentContentHistoryEntriesQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['entryIds' => '[String!]!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'documentContentHistoryEntries', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): DocumentContentHistoryPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): DocumentContentHistoryEntriesQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(DocumentContentHistoryEntriesQueryResponse::class, $query))->throw();
		
		assert($response instanceof DocumentContentHistoryEntriesQueryResponse);
		
		return $response;
	}
}
