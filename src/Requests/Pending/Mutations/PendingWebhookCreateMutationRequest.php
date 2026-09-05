<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\WebhookPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\WebhookCreateMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingWebhookCreateMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success'];

	protected const ARGUMENT_TYPES = ['input' => 'WebhookCreateInput!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'webhookCreate', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): WebhookPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): WebhookCreateMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(WebhookCreateMutationResponse::class, $query))->throw();
		
		assert($response instanceof WebhookCreateMutationResponse);
		
		return $response;
	}
}
