<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\WebhookRotateSecretPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\WebhookRotateSecretMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingWebhookRotateSecretMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['lastSyncId', 'success', 'secret'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'webhookRotateSecret', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): WebhookRotateSecretPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): WebhookRotateSecretMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(WebhookRotateSecretMutationResponse::class, $query))->throw();
		
		assert($response instanceof WebhookRotateSecretMutationResponse);
		
		return $response;
	}
}
