<?php

namespace Glhd\Linearavel\Requests\Pending\Queries;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\WebhookFailureEvent;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Queries\AuditLogWebhookFailureEventsQueryResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Illuminate\Support\Collection;

class PendingAuditLogWebhookFailureEventsQueryRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['id', 'createdAt', 'url', 'executionId', 'httpStatus', 'responseOrError'];

	protected const ARGUMENT_TYPES = ['webhookId' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('query', 'auditLogWebhookFailureEvents', $args, static::ARGUMENT_TYPES));
	}

	/** @returns Collection<int, WebhookFailureEvent> */
	public function get(string ...$fields): Collection
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): AuditLogWebhookFailureEventsQueryResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(AuditLogWebhookFailureEventsQueryResponse::class, $query))->throw();
		
		assert($response instanceof AuditLogWebhookFailureEventsQueryResponse);
		
		return $response;
	}
}
