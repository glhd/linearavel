<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\DocumentContentHistoryTimelinePayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\DocumentContentHistoryTimelineQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingDocumentContentHistoryTimelineQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'documentContentHistoryTimeline', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): DocumentContentHistoryTimelinePayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): DocumentContentHistoryTimelineQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(DocumentContentHistoryTimelineQueryResponse::class, $query))->throw();
		
		assert($response instanceof DocumentContentHistoryTimelineQueryResponse);
		
		return $response;
	}
}
