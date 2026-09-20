<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\IssueTitleSuggestionFromCustomerRequestPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\IssueTitleSuggestionFromCustomerRequestQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingIssueTitleSuggestionFromCustomerRequestQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'title', 'logId'];

	protected const ARGUMENT_TYPES = ['request' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'issueTitleSuggestionFromCustomerRequest', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): IssueTitleSuggestionFromCustomerRequestPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): IssueTitleSuggestionFromCustomerRequestQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(IssueTitleSuggestionFromCustomerRequestQueryResponse::class, $query))->throw();
		
		assert($response instanceof IssueTitleSuggestionFromCustomerRequestQueryResponse);
		
		return $response;
	}
}
