<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\WebhookFailureEvent;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\FailuresForOauthWebhooksQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingFailuresForOauthWebhooksQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'url', 'executionId', 'httpStatus', 'responseOrError'];

	protected const ARGUMENT_TYPES = ['oauthClientId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'failuresForOauthWebhooks', $args, static::ARGUMENT_TYPES));
	}

	/** @returns Collection<int, WebhookFailureEvent> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): FailuresForOauthWebhooksQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(FailuresForOauthWebhooksQueryResponse::class, $query))->throw();
		
		assert($response instanceof FailuresForOauthWebhooksQueryResponse);
		
		return $response;
	}
}
