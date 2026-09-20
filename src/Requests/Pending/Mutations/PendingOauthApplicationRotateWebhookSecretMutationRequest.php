<?php

namespace Glhd\Linearavel\Requests\Pending\Mutations;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Data\OAuthApplicationRotateWebhookSecretPayload;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Responses\Mutations\OauthApplicationRotateWebhookSecretMutationResponse;
use Glhd\Linearavel\Support\GraphQueryBuilder;

class PendingOauthApplicationRotateWebhookSecretMutationRequest extends PendingLinearRequest
{
	protected const DEFAULT_ATTRIBUTES = ['success', 'webhookSecret'];

	protected const ARGUMENT_TYPES = ['id' => 'String!'];

	public function __construct(LinearConnector $connector, public array $args = [])
	{
		parent::__construct($connector, GraphQueryBuilder::make('mutation', 'oauthApplicationRotateWebhookSecret', $args, static::ARGUMENT_TYPES));
	}

	public function get(string ...$fields): OAuthApplicationRotateWebhookSecretPayload
	{
		return $this->response(...$fields)->resolve();
	}

	public function response(string ...$fields): OauthApplicationRotateWebhookSecretMutationResponse
	{
		$query = $this->query->withFields($this->normalizeFields($fields));
		
		$response = $this->connector->send(new LinearRequest(OauthApplicationRotateWebhookSecretMutationResponse::class, $query))->throw();
		
		assert($response instanceof OauthApplicationRotateWebhookSecretMutationResponse);
		
		return $response;
	}
}
